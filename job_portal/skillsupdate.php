<?php
include('database_connection.php');


// Check if skill_id is set
if(isset($_REQUEST['skill_id'])) {
    $skill_id = $_REQUEST['skill_id'];
    
    $stmt =$connection->prepare("SELECT * FROM skills WHERE skill_id=?");
    $stmt->bind_param("i", $skill_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $skill_id = $row['skill_id'];
        $skill_name = $row['skill_name'];
        $certification = $row['certification'];
        $years_of_experience = $row['years_of_experience'];
        $candidate_id = $row['candidate_id'];
    } else {
        echo "Skill not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record in Skills Table</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Skills form -->
        <h2><u>Update Form of Skills</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="skill_name">skill_name:</label>
            <input type="text" name="skill_name" value="<?php echo isset($skill_name) ? $skill_name : ''; ?>">
            <br><br>

            <label for="certification">Certification:</label>
            <input type="text" name="certification" value="<?php echo isset($certification) ? $certification : ''; ?>">
            <br><br>

            <label for="years_of_experience">Years of Experience:</label>
            <input type="number" name="years_of_experience" value="<?php echo isset($years_of_experience) ? $years_of_experience : ''; ?>">
            <br><br>

            <label for="candidate_id">Candidate_id:</label>
            <input type="number" name="candidate_id" value="<?php echo isset($candidate_id) ? $candidate_id : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $skill_name = $_POST['skill_name'];
    $certification = $_POST['certification'];
    $years_of_experience = $_POST['years_of_experience'];
    $candidate_id = $_POST['candidate_id'];
    
    // Update the skill in the database
    $stmt = $connection->prepare("UPDATE skills SET skill_name=?, certification=?, years_of_experience=?, candidate_id=? WHERE skill_id=?");
    $stmt->bind_param("ssssi", $skill_name, $certification, $years_of_experience, $candidate_id, $skill_id);
    if ($stmt->execute()) {
        echo "Skill updated successfully! <br><br>
             <a href='skills.php'>OK</a>";
        // Consider redirecting to a success page or displaying confirmation
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>

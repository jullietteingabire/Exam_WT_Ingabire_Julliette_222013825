<?php
include('database_connection.php');

// Check if resume_id is set
if (isset($_REQUEST['resume_id'])) {
  $resume_id = $_REQUEST['resume_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM resumes WHERE resume_id=?");
  $stmt->bind_param("i", $resume_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $y = $row['skills'];
    $z = $row['reference'];
    $w = $row['langauges'];
    $w = $row['experience_years'];
    $w = $row['education_level'];
    $w = $row['candidate_id'];
  } else {
    echo " resumes not found.";
  }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Update resumes</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update resumes form -->
    <h2><u>Update Form of resumes</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="skills">skills:</label>
    <input type="text" name="skills" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="reference">reference:</label>
    <input type="text" name="reference" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="langauges">langauges:</label>
    <input type="text" name="langauges" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="experience_years">experience_years:</label>
    <input type="number" name="experience_years" value="<?php echo isset($w) ? $w : ''; ?>"><br><br>

    <label for="education_level">education_level:</label>
    <input type="text" name="education_level" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="candidate_id">candidate_id:</label>
    <input type="number" name="candidate_id" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $skills = $_POST['skills'];
  $reference = $_POST['reference'];
  $langauges = $_POST['langauges'];
  $experience_years = $_POST['experience_years'];
  $education_level = $_POST['education_level'];
  $candidate_id = $_POST['candidate_id'];


  // Update the resumes in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE resumes SET skills=?, reference=?, langauges=?,experience_years=?,education_level=?,candidate_id=? WHERE resume_id=?");
  $stmt->bind_param("sssssi", $skills, $reference, $langauges,$experience_years,$education_level,$candidate_id, $resume_id);
  $stmt->execute();

  // Redirect to resume_id
  header('Location: resumes.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
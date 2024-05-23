<?php
include('database_connection.php');

// Check if experience_id is set
if (isset($_REQUEST['experience_id'])) {
  $experience_id = $_REQUEST['experience_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM experiences WHERE experience_id=?");
  $stmt->bind_param("i", $experience_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['experience_id'];
    $y = $row['company'];
    $z = $row['postion'];
    $w = $row['start_date'];
    $x = $row['end_date'];
    $x = $row['candidate_id'];
  } else {
    echo "experiences not found.";
  }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Update experience</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of experiences</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="company">company:</label>
    <input type="text" name="company" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="postion">postion:</label>
    <input type="text" name="industry" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="start_date">start_date:</label>
    <input type="date" name="start_date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="end_date">end_date:</label>
    <input type="date" name="end_date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="candidate_id">candidate_id:</label>
    <input type="numbert" name="candidate_id" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $company = $_POST['company'];
  $postion = $_POST['postion'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $candidate_id = $_POST['candidate_id'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE experiences SET company=?,postion=?, start_date=?,end_date=?,candidate_id=? WHERE experience_id
    ");
  $stmt->bind_param("sssss", $company, $postion, $start_date,$end_date,$candidate_id, $experience_id);
  $stmt->execute();

  // Redirect to experience_id
  header('Location: experiences.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
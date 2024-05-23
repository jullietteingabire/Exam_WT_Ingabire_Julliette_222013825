<?php
include('database_connection.php');

// Check if job_id is set
if (isset($_REQUEST['job_id'])) {
  $job_id = $_REQUEST['job_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM jobs WHERE job_id=?");
  $stmt->bind_param("i", $job_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['job_id'];
    $y = $row['title'];
    $z = $row['description'];
    $w = $row['location'];
    $x = $row['company_id'];
  } else {
    echo " jobs not found.";
  }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Update jobs</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update jobs form -->
    <h2><u>Update Form of jobs</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="title">title:</label>
    <input type="text" name="title" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="description">description:</label>
    <input type="text" name="description" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="location">location:</label>
    <input type="text" name="location" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for=" company_id"> company_id:</label>
    <input type="number" name=" company_id" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $title = $_POST['title'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $company_id = $_POST['company_id'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE jobs SET title=?, description=?, location=?,company_id=? WHERE job_id=?");
  $stmt->bind_param("ssssi", $title, $description, $location,$company_id, $job_id);
  $stmt->execute();

  // Redirect to job_id
  header('Location: jobs.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
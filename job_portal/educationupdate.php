<?php
include('database_connection.php');

// Check if education_id is set
if (isset($_REQUEST['education_id'])) {
  $education_id = $_REQUEST['education_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM education WHERE education_id=?");
  $stmt->bind_param("i", $education_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $y = $row['start_date'];
    $z = $row['end_date'];
    $w = $row['graduation_date'];
    $w = $row['degree'];
    $w = $row['field_of_study'];
  } else {
    echo "education not found.";
  }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Update education</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of education</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="start_date">start_date:</label>
    <input type="date" name="start_date" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="end_date">end_date:</label>
    <input type="date" name="end_date" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="graduation_date">graduation_date:</label>
    <input type="date" name="graduation_date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="degree">degree:</label>
    <input type="text" name="degree" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

    <label for="field_of_study">field_of_study:</label>
    <input type="text" name="field_of_study" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $graduation_date = $_POST['graduation_date'];
  $degree = $_POST['degree'];
 $field_of_study = $_POST['field_of_study'];
  // Update the education in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE education SET start_date=?,end_date=?, graduation_date=?,degree=?,field_of_study=? WHERE education_id=?");
  $stmt->bind_param("sssssi", $start_date, $end_date, $graduation_date,$degree,$field_of_study,$education_id);
  $stmt->execute();

  // Redirect to education_id
  header('Location:education.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
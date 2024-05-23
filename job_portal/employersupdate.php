<?php
include('database_connection.php');

// Check if employer_id is set
if (isset($_REQUEST['employer_id'])) {
  $employer_id = $_REQUEST['employer_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM employers WHERE employer_id=?");
  $stmt->bind_param("i", $employer_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $y = $row['name'];
    $z = $row['email'];
    $w = $row['industry'];
    
  } else {
    echo "employers not found.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update employers</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of employers</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="name">name:</label>
    <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="email">email:</label>
    <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="industry">industry:</label>
    <input type="text" name="industry" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
 <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $industry = $_POST['industry'];
  

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE employers SET name=?, email=?, industry=? WHERE employer_id=?");
  $stmt->bind_param("sssi", $name, $email, $industry, $employer_id);
  $stmt->execute();

  // Redirect to employer_id
  header('Location: employers.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
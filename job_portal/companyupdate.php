<?php
include('database_connection.php');

// Check if company_id is set
if (isset($_REQUEST['company_id'])) {
  $company_id = $_REQUEST['company_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM company WHERE company_id=?");
  $stmt->bind_param("i", $company_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['company_id'];
    $y = $row['name'];
    $z = $row['industry'];
    $w = $row['location'];
    $x = $row['founded_date'];
  } else {
    echo " company not found.";
  }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Update company</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of company</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="name">name:</label>
    <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="industry">industry:</label>
    <input type="text" name="industry" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="location">location:</label>
    <input type="text" name="location" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="founded_date">founded_datel:</label>
    <input type="date" name="founded_date" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $name = $_POST['name'];
  $industry = $_POST['industry'];
  $location = $_POST['location'];
  $founded_date = $_POST['founded_date'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE company SET name=?, industry=?, location=?,founded_date=? WHERE company_id=?");
  $stmt->bind_param("sssss", $name, $industry, $location,$founded_date, $company_id);
  $stmt->execute();

  // Redirect to company_id
  header('Location: company.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
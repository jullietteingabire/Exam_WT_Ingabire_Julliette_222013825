<?php
include('database_connection.php');

// Check if salary_range_id is set
if (isset($_REQUEST['salary_range_id'])) {
  $salary_range_id = $_REQUEST['salary_range_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM salaryranges WHERE salary_range_id=?");
  $stmt->bind_param("i", $salary_range_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $y = $row['minimum_salary'];
    $z = $row['maximum_salary'];
    $w = $row['currency'];
    
  } else {
    echo " salaryranges not found.";
  }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Update salaryranges</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update salaryranges form -->
    <h2><u>Update Form of salaryranges</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="minimum_salary">minimum_salary:</label>
    <input type="number" name="minimum_salary" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="maximum_salary">maximum_salary:</label>
    <input type="number" name="maximum_salary" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="currency">currency:</label>
    <input type="text" name="currency" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

    
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $minimum_salary= $_POST['minimum_salary'];
  $maximum_salary = $_POST['maximum_salary'];
  $currency = $_POST['currency'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE salaryranges SET minimum_salary=?, maximum_salary=?, currency=? WHERE salary_range_id=?");
  $stmt->bind_param("ssss", $minimum_salary, $maximum_salary, $currency, $salary_range_id);
  $stmt->execute();
  // Redirect to salary_range_id
  header('Location: salaryranges.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
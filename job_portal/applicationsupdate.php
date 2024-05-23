<?php
include('database_connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['application_id'])) {
  $application_id = $_REQUEST['application_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM applications WHERE application_id=?");
  $stmt->bind_param("i", $application_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $y = $row['application_date'];
    $z = $row['candidate_id'];
    $w = $row['payment'];
  } else {
    echo "applications not found.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update applications</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update applications form -->
    <h2><u>Update Form of applications</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="application_date">application_date:</label>
    <input type="application_date" name="application_date" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="candidate_id">candidate_id:</label>
    <input type="number" name="candidate_id" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="payment">payment:</label>
    <input type="number" name="payment" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $application_date = $_POST['application_date'];
  $candidate_id = $_POST['candidate_id'];
  $payment = $_POST['payment'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE applications SET application_date=?, candidate_id=?, payment=? WHERE application_id=?");
  $stmt->bind_param("siii", $application_date, $candidate_id, $payment, $application_id);
  $stmt->execute();

  // Redirect to applications.php
  header('Location:applications.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
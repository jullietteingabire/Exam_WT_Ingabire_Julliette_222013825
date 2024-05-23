<?php
include('database_connection.php');

// Check if candidate_id is set
if (isset($_REQUEST['candidate_id'])) {
  $candidate_id = $_REQUEST['candidate_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM candidates WHERE candidate_id=?");
  $stmt->bind_param("i", $candidate_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['candidate_id'];
    $y = $row['first_name'];
    $z = $row['last_name'];
    $w = $row['phone'];
    $x = $row['email'];
  } else {
    echo "candidates not found.";
  }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Update candidates</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of candidates</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="first_name">first_name:</label>
    <input type="text" name="first_name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="last_name">last_name:</label>
    <input type="text" name="last_name" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="phone">phone:</label>
    <input type="number" name="phone" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

     <label for="email">email:</label>
    <input type="email" name="email" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE candidates SET first_name=?, last_name=?, phone=?,email=? WHERE candidate_id=?");
  $stmt->bind_param("sssii", $first_name, $last_name, $phone,$email, $candidate_id);
  $stmt->execute();

  // Redirect to candidate_id
  header('Location: candidates.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
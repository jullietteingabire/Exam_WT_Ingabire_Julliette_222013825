<?php
include('database_connection.php');


// Check if candidate_id is set and is a valid integer
if(isset($_REQUEST['candidate_id']) && ctype_digit($_REQUEST['candidate_id'])) {
    $candidate_id = $_REQUEST['candidate_id'];

    // Prepare the DELETE statement
    $stmt = $connection->prepare("DELETE FROM candidates WHERE candidate_id=?");
    if (!$stmt) {
        die("Prepare failed: " . $connection->error);
    }
    $stmt->bind_param("i", $candidate_id);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Execute the DELETE statement
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid or missing candidate ID.";
}

// Close the connection
$connection->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <script>
        // JavaScript function to confirm deletion
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>
<body>
    <?php
    // Display the delete form
    if(isset($candidate_id)) {
        ?>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="candidate_id" value="<?php echo htmlspecialchars($candidate_id); ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
    }
    ?>
</body>
</html>

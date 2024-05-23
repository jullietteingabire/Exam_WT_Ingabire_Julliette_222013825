<?php
include('database_connection.php');


// Check if application_id is set
if(isset($_REQUEST['application_id'])) {
    $application_id = $_REQUEST['application_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM applications WHERE application_id=?");
    $stmt->bind_param("i", $application_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='applications.php'>Go back</a>";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="application_id" value="<?php echo $application_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "application_id is not set.";
}

$connection->close();
?>

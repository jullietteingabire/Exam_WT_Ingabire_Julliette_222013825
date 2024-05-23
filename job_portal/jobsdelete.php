<?php
include('database_connection.php');


// Check if job_id is set
if(isset($_REQUEST['job_id'])) {
    $job_id = $_REQUEST['job_id'];
    
   // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM jobs WHERE job_id=?");
    $stmt->bind_param("i", $job_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='jobs.php'>Go back</a>";
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
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "job_id is not set.";
}

$connection->close();
?>

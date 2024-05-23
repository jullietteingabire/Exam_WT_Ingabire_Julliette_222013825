<?php
include('database_connection.php');


// Check if resume_id is set
if(isset($_REQUEST['resume_id'])) {
    $resume_id = $_REQUEST['resume_id'];
    
   // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM resumes WHERE resume_id=?");
    $stmt->bind_param("i", $resume_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='resumes.php'>Go back</a>";
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
            <input type="hidden" name="resume_id" value="<?php echo $resume_id; ?>">
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

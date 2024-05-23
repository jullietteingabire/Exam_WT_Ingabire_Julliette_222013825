<?php
include('database_connection.php');


// Check if education_id is set
if(isset($_REQUEST['education_id'])) {
    $education_id = $_REQUEST['education_id'];
    
   // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM education WHERE education_id=?");
    $stmt->bind_param("i", $education_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='education.php'>Go back</a>";
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
            <input type="hidden" name="education_id" value="<?php echo $education_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "education_id is not set.";
}

$connection->close();
?>

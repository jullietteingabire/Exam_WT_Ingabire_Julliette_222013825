<?php
include('database_connection.php');

// Check if skill_id is set
if(isset($_REQUEST['skill_id'])) {
    $skill_id = $_REQUEST['skill_id'];
    
   // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM skills WHERE skill_id=?");
    $stmt->bind_param("i", $skill_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='skills.php'>Go back</a>";
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
            <input type="hidden" name="skill_id" value="<?php echo $skill_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "skill_id is not set.";
}

$connection->close();
?>

<?php
include('database_connection.php');


// Check if salary_range_id is set
if(isset($_REQUEST['salary_range_id'])) {
    $salary_range_id = $_REQUEST['salary_range_id'];
    
   // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM salaryranges WHERE salary_range_id=?");
    $stmt->bind_param("i", $salary_range_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='salaryranges.php'>Go back</a>";
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
            <input type="hidden" name="salary_range_id" value="<?php echo $salary_range_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "salary_range_id is not set.";
}

$connection->close();
?>

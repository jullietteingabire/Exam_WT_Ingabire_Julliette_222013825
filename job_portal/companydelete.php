<?php
include('database_connection.php');

// Check if company_id is set
if(isset($_REQUEST['company_id'])) {
    $company_id = $_REQUEST['company_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM company WHERE company_id=?");
    $stmt->bind_param("i", $company_id);
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='company.php'>Go back</a>";
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
            <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
            <input type="submit" value="Delete">
        </form>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "company_id is not set.";
}

$connection->close();
?>

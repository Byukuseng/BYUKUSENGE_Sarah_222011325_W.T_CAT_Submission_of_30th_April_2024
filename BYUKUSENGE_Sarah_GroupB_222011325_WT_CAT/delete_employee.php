<?php
include('db_connection.php');

// Check if Employee_Id is set
if(isset($_REQUEST['EmployeeID'])) {
    $empid = $_REQUEST['EmployeeID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Employees WHERE EmployeeID=?");
    $stmt->bind_param("i", $empid);
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
            <input type="hidden" name="empid" value="<?php echo $empid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
<?php

    $stmt->close();
} else {
    echo "Employee Id is not set.";
}

$connection->close();
?>

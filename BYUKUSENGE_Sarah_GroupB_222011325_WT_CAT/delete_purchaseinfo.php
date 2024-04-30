<?php
include('db_connection.php');

// Check if Purchase_Id is set
if(isset($_REQUEST['PurchaseID'])) {
    $purchid = $_REQUEST['PurchaseID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM purchaseinfo WHERE PurchaseID=?");
    $stmt->bind_param("i", $purchid);
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
            <input type="hidden" name="purchid" value="<?php echo $purchid; ?>">
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
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "Purchase Id is not set.";
}

$connection->close();
?>

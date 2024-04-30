<?php
include('db_connection.php');

// Check if Shipping_Id is set
if(isset($_REQUEST['ShippingID'])) {
    $shipid = $_REQUEST['ShippingID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM shipping WHERE ShippingID=?");
    $stmt->bind_param("i", $shipid);
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
            <input type="hidden" name="shipid" value="<?php echo $shipid; ?>">
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
    echo "Shipping Id is not set.";
}

$connection->close();
?>

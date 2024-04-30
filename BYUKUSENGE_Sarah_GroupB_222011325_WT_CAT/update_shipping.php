<?php
include('db_connection.php');

// Check if ShippingID is set
if(isset($_REQUEST['ShippingID'])) {
    $shipid = $_REQUEST['ShippingID'];
    
    $stmt = $connection->prepare("SELECT * FROM shipping WHERE ShippingID=?");
    $stmt->bind_param("i", $shipid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['PurchaseID'];
        $z = $row['ShippingType'];
        $w = $row['ShippingCost'];
        $p = $row['ShippingDate'];
    } else {
        echo "Shipping not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update shipping</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update shipping form -->
    <h2><u>Update Form of shipping</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="purchid">Purchase ID:</label>
        <input type="text" name="purchid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="shiptype">Shipping Type:</label>
        <input type="text" name="shiptype" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="shipcost">Shipping Cost:</label>
        <input type="number" name="shipcost" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="shipdate">Shipping Date:</label>
        <input type="date" name="shipdate" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $purchaseid = $_POST['purchid'];
    $shippingtype = $_POST['shiptype'];
    $shippingcost = $_POST['shipcost'];
    $shippingdate = $_POST['shipdate'];
    
    // Update the shipping in the database
    $stmt = $connection->prepare("UPDATE shipping SET PurchaseID=?, ShippingType=?, ShippingCost=?, ShippingDate=? WHERE ShippingID=?");
    $stmt->bind_param("ssdsi", $purchaseid, $shippingtype, $shippingcost, $shippingdate, $shipid);
    $stmt->execute();
   
    // Redirect to shipping.php
    header('Location: Shipping.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>

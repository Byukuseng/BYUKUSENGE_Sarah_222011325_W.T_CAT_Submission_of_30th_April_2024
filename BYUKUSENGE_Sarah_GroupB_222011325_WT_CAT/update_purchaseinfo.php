<?php
   include('db_connection.php');

// Check if Purchase_Id is set
if(isset($_REQUEST['PurchaseID'])) {
    $purchid = $_REQUEST['PurchaseID'];
    
    $stmt = $connection->prepare("SELECT * FROM purchaseinfo WHERE PurchaseID=?");
    $stmt->bind_param("i", $purchid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['PurchaseID'];
        $y = $row['CustomerID'];
        $z = $row['EmployeeID'];
        $w = $row['PurchaseDate'];
        $p = $row['TotalAmount'];
    } else {
        echo "purchase not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update purchaseinfo</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update purchaseinfo form -->
    <h2><u>Update Form of purchaseinfo</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="cusid">Customer ID:</label>
        <input type="number" name="cusid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="empid">Employee ID:</label>
        <input type="number" name="empid" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="purchdate">Purchase Date:</label>
        <input type="date" name="purchdate" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="totalamnt">Total Amount:</label>
        <input type="number" name="totalamnt" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
         
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $custid = $_POST['cusid'];
    $empid = $_POST['empid'];
    $purchasedate = $_POST['purchdate'];
    $totamount = $_POST['totalamnt'];
    
    // Update the purchasinfo in the database
    $stmt = $connection->prepare("UPDATE purchaseinfo SET CustomerID=?, EmployeeID=?, PurchaseDate=?, TotalAmount=? WHERE PurchaseID=?");
    $stmt->bind_param("ssddi", $custid, $empid, $purchasedate, $totamount, $purchid);
    $stmt->execute();
  
    // Redirect to purchasinfo.php
    header('Location: purchasinfo.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>

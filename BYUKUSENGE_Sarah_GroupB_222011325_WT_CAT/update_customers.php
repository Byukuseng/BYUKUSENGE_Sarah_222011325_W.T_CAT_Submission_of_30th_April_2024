<?php
include('db_connection.php');

// Check if customerID is set
if(isset($_REQUEST['CustomerID'])) {
    $custid = $_REQUEST['CustomerID'];
   
    $stmt = $connection->prepare("SELECT * FROM customers WHERE CustomerID=?");
    $stmt->bind_param("i", $custid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['CustomerID'];
        $y = $row['ProductID'];
        $f = $row['FirstName'];
        $w = $row['LastName'];
        $p = $row['Email'];
        $q = $row['Phone'];
    } else {
        echo "Customer not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update customers</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update customers form -->
    <h2><u>Update Form of customers</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="pid">Product ID:</label>
        <input type="number" name="pid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
 
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>

        <label for="phn">Phone:</label>
        <input type="text" name="phn" value="<?php echo isset($q) ? $q : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $pid = $_POST['pid'];
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Email = $_POST['email'];
    $phone = $_POST['phn'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE customers SET ProductID=?, FirstName=?, LastName=?, Email=?, Phone=? WHERE CustomerID=?");
    $stmt->bind_param("issssi", $pid, $Fname, $Lname, $Email, $phone, $custid);
    $stmt->execute();
  
    // Redirect to customer.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>

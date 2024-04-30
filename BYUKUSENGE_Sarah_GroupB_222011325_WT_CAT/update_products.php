<?php
include('db_connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['ProductID'])) {
  $pid = $_REQUEST['ProductID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM Products WHERE ProductID=?");
  $stmt->bind_param("i", $pid);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['ProductID'];
    $y = $row['ProductName'];
    $z = $row['Price'];
    $w = $row['Category'];
  } else {
    echo "Product not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update products</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of products</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="pname">Product Name:</label>
    <input type="text" name="pname" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="price">Price:</label>
    <input type="number" name="price" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="categ">Category:</label>
    <input type="text" name="categ" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $product_name = $_POST['pname'];
  $price = $_POST['price'];
  $category = $_POST['categ'];

  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE Products SET ProductName=?, Price=?, Category=? WHERE ProductID=?");
  $stmt->bind_param("ssdi", $product_name, $price, $category, $pid);
  $stmt->execute();

  // Redirect to product.php
  header('Location: products.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
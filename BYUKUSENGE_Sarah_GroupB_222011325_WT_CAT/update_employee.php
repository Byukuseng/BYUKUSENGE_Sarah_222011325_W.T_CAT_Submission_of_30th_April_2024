<?php
include('db_connection.php');

// Check if EmployeeID is set
if(isset($_REQUEST['EmployeeID'])) {
    $empid = $_REQUEST['EmployeeID'];
    
    $stmt = $connection->prepare("SELECT * FROM Employees WHERE EmployeeID=?");
    $stmt->bind_param("i", $empid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['FirstName'];
        $z = $row['LastName'];
        $w = $row['Position'];
        $p = $row['Email'];
    } else {
        echo "Employee not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update employee</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update employee form -->
    <h2><u>Update Form of employee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

       <label for="postn">Position:</label>
       <select name="postn">
            <option value="manager" <?php if(isset($w) && $w == "Manager") echo "selected"; ?>>Manager</option>
            <option value="secretary" <?php if(isset($w) && $w == "Secretary") echo "selected"; ?>>Secretary</option>
            <option value="accountant" <?php if(isset($w) && $w == "Accountant") echo "selected"; ?>>Accountant</option>
            <option value="ceo" <?php if(isset($w) && $w == "CEO") echo "selected"; ?>>CEO</option>
            <option value="technician" <?php if(isset($w) && $w == "Technician") echo "selected"; ?>>Technician</option>
       </select><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $position = $_POST['postn'];
    $Email = $_POST['email'];
    
    // Update the employee in the database
    $stmt = $connection->prepare("UPDATE Employees SET FirstName=?, LastName=?, Position=?, Email=? WHERE EmployeeID=?");
    $stmt->bind_param("ssssi", $Fname, $Lname, $position, $Email, $empid);
    $stmt->execute();
   
    // Redirect to employee.php
    header('Location: employee.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>

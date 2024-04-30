<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>customer table</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: green;
      background-color: orange;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: brown;
    }
    /* Unvisited link */
    a:link {
      color: purple; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: dimgray;
    }

    /* Active link */
    a:active {
      background-color: blue;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1250px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>

   <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>

  </head>

  <header>

<body bgcolor="darkgrey">

  <form method="GET" class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./image/online.jpeg" width="90" height="70" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./products.php">PRODUCTS</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./employee.php">EMPLOYEES</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">CUSTOMER</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./purchasinfo.php">PURCHASE-INFO</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./Shipping.php">SHIPPING</a></li>
    
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Account</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

<h1><u> Customers Form </u></h1>
    <form method="post" onsubmit="return confirmInsert();">

        <label for="cusid">CustomerID:</label>
        <input type="number" id="cusid" name="cusid"><br><br>

        <label for="pid">ProductID:</label>
        <input type="number" id="pid" name="pid"><br><br>

        <label for="fname">FirstName:</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">LastName:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO customers(CustomerID, ProductID, FirstName, LastName, Email, Phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idssss", $custid, $pid, $firstname, $lastname, $Email, $telephone);
    // Set parameters and execute
    $custid = $_POST['cusid'];
    $pid = $_POST['pid'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Email = $_POST['email'];
    $telephone = $_POST['phone'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
include('db_connection.php');

// SQL query to fetch data from the Customers table
$sql = "SELECT * FROM customers";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Customers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of Customers</h2></center>
    <table border="3">
        <tr>
            <th>CustomerID</th>
            <th>ProductID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
<?php
include('db_connection.php');

        // Prepare SQL query to retrieve all Customers
        $sql = "SELECT * FROM customers";
        $result = $connection->query($sql);

        // Check if there are any Customers
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $cusid = $row['CustomerID']; // Fetch the Customer_Id
                echo "<tr>
                    <td>" . $row['CustomerID'] . "</td>
                    <td>" . $row['ProductID'] . "</td>
                    <td>" . $row['FirstName'] . "</td>
                    <td>" . $row['LastName'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Phone'] . "</td>
                    <td><a style='padding:4px' href='delete_customers.php?CustomerID=$cusid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_customers.php?CustomerID=$cusid'>Update</a></td> 
                </tr>";
            }

        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

</section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024, Designer by:BYUKUSENGE Sarah</h2></b>
  </center>
</footer>
  
</body>
</html>






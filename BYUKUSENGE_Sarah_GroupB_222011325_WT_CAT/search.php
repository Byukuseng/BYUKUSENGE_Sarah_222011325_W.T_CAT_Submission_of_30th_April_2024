<?php
include('db_connection.php');

// Check if a search term was provided
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Define the SQL queries to search across multiple tables
    $queries = [
        "Products" => "SELECT ProductName FROM Products WHERE ProductName LIKE '%$searchTerm%'",
        "Customers" => "SELECT FirstName FROM Customers WHERE FirstName LIKE '%$searchTerm%'",
        "Employees" => "SELECT FirstName FROM Employees WHERE FirstName LIKE '%$searchTerm%'",
        "PurchaseInfo" => "SELECT CustomerID FROM PurchaseInfo WHERE CustomerID LIKE '%$searchTerm%'",
        "Shipping" => "SELECT ShippingType FROM Shipping WHERE ShippingType LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>";
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>

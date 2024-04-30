<?php
// Connection details
$host = "localhost";
$user = "222011325";
$pass = "sarah";
$database = "online_shop_mgt_system";

// Create a new database connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection for errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
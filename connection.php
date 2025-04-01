<?php
// Database credentials
$host = "localhost";
$user = "root"; // Default user for XAMPP/MAMP
$pass = "";
$dbname = "user_system";

// Create a connection to MySQL database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

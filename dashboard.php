<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}




echo "Welcome, " . $_SESSION['username'] . "!<br>";

if ($_SESSION['role'] == 'admin') {
    echo "<a href='admin.php'>Go to Admin Panel</a><br>";
} else {
    echo "<a href='customer.php'>Go to Customer Dashboard</a><br>";
}
?>

<a href="logout.php">Logout</a>

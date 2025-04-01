<?php
session_start();
if ($_SESSION['role'] !== 'customer') {
    header("Location: dashboard.php");
    exit();
}
echo "Welcome to Customer Dashboard - View Orders";
?>
<a href="logout.php">Logout</a>

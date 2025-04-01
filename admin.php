<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit();
}
echo "Welcome to Admin Panel - Manage Users";
?>
<a href="logout.php">Logout</a>

<?php
include "db.php";
include "functions.php";
getHeader(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");

    echo "Signup successful! <a href='login.php'>Login</a>";
}
?>

<form method="POST" autocomplete="off">
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <select name="role">
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Sign Up</button>
</form>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "mydatabase");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (empty($id)) {
    die("Invalid User ID.");
}

// Fetch user data
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();
if (!$user) {
    die("User not found.");
}

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if (!empty($name) && !empty($email)) {
        $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
        echo "<p>User updated successfully!</p>";
    } else {
        echo "<p>All fields are required!</p>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Update User</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars(string: $user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
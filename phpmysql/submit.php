<?php
// Database connection
$conn = new mysqli(hostname: "localhost", username: "root", password: "", database: "mydatabase");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo '
<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <div class="card shadow-lg p-5">
            <h2 class="text-success">🎉 Thank You! 🎉</h2>
            <p class="mt-3">Your record has been submitted successfully.</p>
            <a href="list.php" class="btn btn-primary mt-3">View Records</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';

    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

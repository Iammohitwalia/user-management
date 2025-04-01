<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Delete record
$sql = "DELETE FROM users WHERE id=$id";

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
                <h2 class="text-success">😟 Bye 😟</h2>
                <p class="mt-3">Your record has been deleted successfully.</p>
                <a href="list.php" class="btn btn-primary mt-3">View Records</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
    
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

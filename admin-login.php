<?php
session_start();

// Connect to your database
$mysqli = new mysqli('localhost', 'root', '', 'creative_showcase');
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}

// Get submitted form values
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Look for the admin by username
$stmt = $mysqli->prepare("SELECT admin_id, password FROM admins WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin_id'] = $admin['admin_id']; // Mark user as logged in
    header("Location: /creativeshowcase/admin-dashboard.php");   // Redirect to your admin page
    exit;
} else {
    echo "Invalid username or password.";
}
?>

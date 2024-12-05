<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    $query = $conn->prepare("INSERT INTO artists (name, bio) VALUES (?, ?)");
    $query->bind_param("ss", $name, $bio);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Artist uploaded successfully");
    } else {
        echo "Error: Unable to upload artist.";
    }

    $query->close();
}

$conn->close();
?>

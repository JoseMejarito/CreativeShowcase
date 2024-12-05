<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist_id = $_POST['artist_id'];
    $description = $_POST['description'];

    $query = $conn->prepare("INSERT INTO works (title, artist_id, description) VALUES (?, ?, ?)");
    $query->bind_param("sis", $title, $artist_id, $description);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Work uploaded successfully");
    } else {
        echo "Error: Unable to upload work.";
    }

    $query->close();
}

$conn->close();
?>

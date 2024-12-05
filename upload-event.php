<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $query = $conn->prepare("INSERT INTO events (title, description, date) VALUES (?, ?, ?)");
    $query->bind_param("sss", $title, $description, $date);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Event uploaded successfully");
    } else {
        echo "Error: Unable to upload event.";
    }

    $query->close();
}

$conn->close();
?>

<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $news_id = (int) $_GET['id'];

    $query = $conn->prepare("DELETE FROM news WHERE news_id = ?");
    $query->bind_param("i", $news_id);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=News deleted successfully");
    } else {
        echo "Error: Unable to delete news.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
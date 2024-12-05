<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $artist_id = (int) $_GET['id'];

    $query = $conn->prepare("DELETE FROM artists WHERE artist_id = ?");
    $query->bind_param("i", $artist_id);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Artist deleted successfully");
    } else {
        echo "Error: Unable to delete artist.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

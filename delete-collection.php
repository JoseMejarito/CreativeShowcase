<?php
require 'connection.php';

if (isset($_GET['collection_id'])) {
    $collection_id = (int) $_GET['collection_id'];

    $query = $conn->prepare("DELETE FROM collections WHERE collection_id = ?");
    $query->bind_param("i", $collection_id);

    if ($query->execute()) {
        header("Location: admin-collections.php?message=Collection deleted successfully");
    } else {
        echo "Error: Unable to delete collection.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

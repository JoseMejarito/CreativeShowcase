<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $collection_name = $_POST['collection_name'];

    $query = $conn->prepare("INSERT INTO collections (collection_name) VALUES (?)");
    $query->bind_param("s", $collection_name);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Collection uploaded successfully");
    } else {
        echo "Error: Unable to upload collection.";
    }

    $query->close();
}

$conn->close();
?>

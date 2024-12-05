<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group_name = $_POST['group_name'];

    $query = $conn->prepare("INSERT INTO groups (group_name) VALUES (?)");
    $query->bind_param("s", $group_name);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Group uploaded successfully");
    } else {
        echo "Error: Unable to upload group.";
    }

    $query->close();
}

$conn->close();
?>

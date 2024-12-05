<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $group_id = (int) $_GET['id'];

    $query = $conn->prepare("DELETE FROM groups WHERE group_id = ?");
    $query->bind_param("i", $group_id);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Group deleted successfully");
    } else {
        echo "Error: Unable to delete group.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $work_id = (int) $_GET['id'];

    $query = $conn->prepare("DELETE FROM works WHERE work_id = ?");
    $query->bind_param("i", $work_id);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Work deleted successfully");
    } else {
        echo "Error: Unable to delete work.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

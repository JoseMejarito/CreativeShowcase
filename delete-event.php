<?php
require 'connection.php';

if (isset($_GET['event_id'])) {
    $event_id = (int) $_GET['event_id'];

    $query = $conn->prepare("DELETE FROM events WHERE event_id = ?");
    $query->bind_param("i", $event_id);

    if ($query->execute()) {
        header("Location: admin-dashboard.php?message=Event deleted successfully");
    } else {
        echo "Error: Unable to delete event.";
    }

    $query->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<?php
include 'connection.php';

// Check if an event ID is provided for editing
if (isset($_GET['event_id'])) {
    $eventId = $_GET['event_id'];

    // Fetch the existing event details
    $eventQuery = $conn->prepare("SELECT title, description, date_start, date_end, location, main_media FROM events WHERE event_id = ?");
    $eventQuery->bind_param("i", $eventId);
    $eventQuery->execute();
    $eventResult = $eventQuery->get_result();
    $event = $eventResult->fetch_assoc();

    // Fetch collections and groups for checkboxes
    $collections = $conn->query("SELECT collection_id, collection_name FROM collections");
    $groups = $conn->query("SELECT group_id, group_name FROM groups");

    // Fetch selected collections and groups for the event
    $selectedCollections = $conn->query("SELECT collection_id FROM event_collections WHERE event_id = $eventId");
    $selectedGroups = $conn->query("SELECT group_id FROM event_groups WHERE event_id = $eventId");

    $selectedCollectionIds = [];
    while ($row = $selectedCollections->fetch_assoc()) {
        $selectedCollectionIds[] = $row['collection_id'];
    }

    $selectedGroupIds = [];
    while ($row = $selectedGroups->fetch_assoc()) {
        $selectedGroupIds[] = $row['group_id'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $location = $_POST['location'];
        $main_media = $_FILES['main_media'];

        // Check if a new media file is uploaded
        if ($main_media['error'] == UPLOAD_ERR_OK) {
            // Upload new main media
            $uploadDir = 'public/';
            $mediaName = time() . '_' . basename($main_media['name']);
            $mediaPath = $uploadDir . $mediaName;

            if (move_uploaded_file($main_media['tmp_name'], $mediaPath)) {
                // Update event details in `events` table
                $query = $conn->prepare(
                    "UPDATE events SET title = ?, description = ?, date_start = ?, date_end = ?, location = ?, main_media = ? WHERE event_id = ?"
                );
                $query->bind_param("ssssssi", $title, $description, $date_start, $date_end, $location, $mediaName, $eventId);
            } else {
                echo "Error: Unable to upload main media.";
            }
        } else {
            // Update event details without changing the media
            $query = $conn->prepare(
                "UPDATE events SET title = ?, description = ?, date_start = ?, date_end = ?, location = ? WHERE event_id = ?"
            );
            $query->bind_param("ssssi", $title, $description, $date_start, $date_end, $location, $eventId);
        }

        if ($query->execute()) {
            // Clear existing collections and groups
            $conn->query("DELETE FROM event_collections WHERE event_id = $eventId");
            $conn->query("DELETE FROM event_groups WHERE event_id = $eventId");

            // Insert new collections
            if (isset($_POST['collections'])) {
                foreach ($_POST['collections'] as $collection_id) {
                    $conn->query("INSERT INTO event_collections (event_id, collection_id) VALUES ($eventId, $collection_id)");
                }
            }

            // Insert new groups
            if (isset($_POST['groups'])) {
                foreach ($_POST['groups'] as $group_id) {
                    $conn->query("INSERT INTO event_groups (event_id, group_id) VALUES ($eventId, $group_id)");
                }
            }

            header("Location: admin-dashboard.php?message=Event updated successfully");
        } else {
            echo "Error: Unable to update event.";
        }
        $query->close();
    }
} else {
    echo "Error: No event ID provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Edit Events</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Event Edit Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Edit Event</h1>

                <form action="admin-edit-event.php?event_id=<?php echo $eventId; ?>" method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full p-4 rounded-lg border" value="<?php echo htmlspecialchars($event['title']); ?>" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-lg font-semibold text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="6" class="w-full p-4 rounded-lg border" required><?php echo htmlspecialchars($event['description']); ?></textarea>
                    </div>

                    <!-- Date Start -->
                    <div class="mb-4">
                        <label for="date_start" class="block text-lg font-semibold text-gray-700">Start Date</label>
                        <input type="date" id="date_start" name="date_start" class="w-full p-4 rounded-lg border" value="<?php echo htmlspecialchars($event['date_start']); ?>" required>
                    </div>

                    <!-- Date End -->
                    <div class="mb-4">
                        <label for="date_end" class="block text-lg font-semibold text-gray-700">End Date</label>
                        <input type="date" id="date_end" name="date_end" class="w-full p-4 rounded-lg border" value="<?php echo htmlspecialchars($event['date_end']); ?>">
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location" class="block text-lg font-semibold text-gray-700">Location</label>
                        <input type="text" id="location" name="location" class="w-full p-4 rounded-lg border" value="<?php echo htmlspecialchars($event['location']); ?>" required>
                    </div>

                    <!-- Main Media Edit -->
                    <div class="mb-4">
                        <label for="main_media" class="block text-lg font-semibold text-gray-700">Main Media (Optional)</label>
                        <input type="file" id="main_media" name="main_media" class="w-full p-4 rounded-lg border" accept="image/*,video/*">
                    </div>

                    <!-- Collections Checklist -->
                    <div class="mb-4">
                        <label class="block text-lg font-semibold text-gray-700">Collections</label>
                        <div class="grid grid-cols-2 gap-4">
                            <?php
                            while ($row = $collections->fetch_assoc()) {
                                $checked = in_array($row['collection_id'], $selectedCollectionIds) ? 'checked' : '';
                                echo "<div>
                                    <input type='checkbox' id='collection_{$row['collection_id']}' name='collections[]' value='{$row['collection_id']}' class='mr-2' $checked>
                                    <label for='collection_{$row['collection_id']}'>{$row['collection_name']}</label>
                                  </div>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Groups Checklist -->
                    <div class="mb-4">
                        <label class="block text-lg font-semibold text-gray-700">Groups</label>
                        <div class="grid grid-cols-2 gap-4">
                            <?php
                            while ($row = $groups->fetch_assoc()) {
                                $checked = in_array($row['group_id'], $selectedGroupIds) ? 'checked' : '';
                                echo "<div>
                                    <input type='checkbox' id='group_{$row['group_id']}' name='groups[]' value='{$row['group_id']}' class='mr-2' $checked>
                                    <label for='group_{$row['group_id']}'>{$row['group_name']}</label>
                                  </div>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-uphsl-blue text-white py-3 px-6 rounded-md hover:bg-uphsl-blue">Update Event</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
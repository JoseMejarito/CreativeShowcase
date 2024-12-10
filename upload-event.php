<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $location = $_POST['location'];
    $collections = $_POST['collections'] ?? []; // Array of selected collections
    $groups = $_POST['groups'] ?? []; // Array of selected groups
    $main_media = $_FILES['main_media'];

    // Upload main media
    $uploadDir = 'public/';
    $mediaName = time() . '_' . basename($main_media['name']);
    $mediaPath = $uploadDir . $mediaName;

    if (move_uploaded_file($main_media['tmp_name'], $mediaPath)) {
        // Insert event details into `events` table
        $query = $conn->prepare(
            "INSERT INTO events (title, description, date_start, date_end, location, main_media) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $query->bind_param("ssssss", $title, $description, $date_start, $date_end, $location, $mediaName);

        if ($query->execute()) {
            $eventId = $query->insert_id;

            // Insert into collections-events linking table
            foreach ($collections as $collection_id) {
                $conn->query("INSERT INTO event_collections (event_id, collection_id) VALUES ($eventId, $collection_id)");
            }

            // Insert into groups-events linking table
            foreach ($groups as $group_id) {
                $conn->query("INSERT INTO event_groups (event_id, group_id) VALUES ($eventId, $group_id)");
            }

            header("Location: admin-dashboard.php?message=Event uploaded successfully");
        } else {
            echo "Error: Unable to upload event.";
        }
        $query->close();
    } else {
        echo "Error: Unable to upload main media.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Upload Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Event Upload Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Upload Event</h1>

                <form action="upload-event.php" method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-lg font-semibold text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="6" class="w-full p-4 rounded-lg border" required></textarea>
                    </div>

                    <!-- Date Start -->
                    <div class="mb-4">
                        <label for="date_start" class="block text-lg font-semibold text-gray-700">Start Date</label>
                        <input type="date" id="date_start" name="date_start" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <!-- Date End -->
                    <div class="mb-4">
                        <label for="date_end" class="block text-lg font-semibold text-gray-700">End Date</label>
                        <input type="date" id="date_end" name="date_end" class="w-full p-4 rounded-lg border">
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location" class="block text-lg font-semibold text-gray-700">Location</label>
                        <input type="text" id="location" name="location" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <!-- Main Media Upload -->
                    <div class="mb-4">
                        <label for="main_media" class="block text-lg font-semibold text-gray-700">Main Media (Required)</label>
                        <input type="file" id="main_media" name="main_media" class="w-full p-4 rounded-lg border" accept="image/*,video/*" required>
                    </div>

                    <!-- Collections Checklist -->
                    <div class="mb-4">
                        <label class="block text-lg font-semibold text-gray-700">Collections</label>
                        <div class="grid grid-cols-2 gap-4">
                            <?php
                            $collections = $conn->query("SELECT collection_id, collection_name FROM collections");
                            while ($row = $collections->fetch_assoc()) {
                                echo "<div>
                                    <input type='checkbox' id='collection_{$row['collection_id']}' name='collections[]' value='{$row['collection_id']}' class='mr-2'>
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
                            $groups = $conn->query("SELECT group_id, group_name FROM groups");
                            while ($row = $groups->fetch_assoc()) {
                                echo "<div>
                                    <input type='checkbox' id='group_{$row['group_id']}' name='groups[]' value='{$row['group_id']}' class='mr-2'>
                                    <label for='group_{$row['group_id']}'>{$row['group_name']}</label>
                                  </div>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-uphsl-blue text-white py-3 px-6 rounded-md hover:bg-uphsl-blue">Upload Event</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

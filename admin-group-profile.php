<?php
require 'connection.php';

$group_id = $_GET['group_id'] ?? null; // Get the group ID from the URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $group_name = $_POST['group_name'];
    $description = $_POST['description'];
    $main_media = $_FILES['main_media'];
    $artist_ids = isset($_POST['artist_ids']) ? $_POST['artist_ids'] : [];
    $collection_id = $_POST['collection_id'];

    // Validate inputs
    if (empty($group_name) || empty($description) || empty($collection_id)) {
        die("Error: All fields are required.");
    }

    // Prepare the update query
    $query = $conn->prepare("UPDATE groups SET group_name = ?, description = ?, collection_id = ? WHERE group_id = ?");
    $query->bind_param("ssii", $group_name, $description, $collection_id, $group_id);

    // Check if a new media file is uploaded
    if ($main_media['tmp_name']) {
        // Handle file upload for main_media
        $media_target_dir = "public/";
        if (!is_dir($media_target_dir)) {
            mkdir($media_target_dir, 0777, true); // Ensure the directory exists
        }
        $media_file_name = uniqid() . "_" . basename($main_media['name']);
        $media_target_file = $media_target_dir . $media_file_name;

        if (move_uploaded_file($main_media['tmp_name'], $media_target_file)) {
            // Update the media file name in the database
            $query->execute();
            $update_media_query = $conn->prepare("UPDATE groups SET main_media = ? WHERE group_id = ?");
            $update_media_query->bind_param("si", $media_file_name, $group_id);
            $update_media_query->execute();
            $update_media_query->close();
        } else {
            echo "Error: Unable to upload main media.";
        }
    } else {
        // If no new media file is uploaded, just execute the update query
        $query->execute();
    }

    // Update group members
    $group_artist_query = $conn->prepare("DELETE FROM group_artists WHERE group_id = ?");
    $group_artist_query->bind_param("i", $group_id);
    $group_artist_query->execute();

    if (!empty($artist_ids)) {
        $group_artist_query = $conn->prepare("INSERT INTO group_artists (group_id, artist_id) VALUES (?, ?)");
        foreach ($artist_ids as $artist_id) {
            $group_artist_query->bind_param("ii", $group_id, $artist_id);
            $group_artist_query->execute();
        }
        $group_artist_query->close();
    }

    header("Location: admin-dashboard.php?message=Group updated successfully");
    exit();
}

// Fetch existing group data
if ($group_id) {
    $group_query = $conn->prepare("SELECT group_name, description, main_media, collection_id FROM groups WHERE group_id = ?");
    $group_query->bind_param("i", $group_id);
    $group_query->execute();
    $group_result = $group_query->get_result();
    $group = $group_result->fetch_assoc();
    $group_query->close();

    // Fetch artist IDs for the current group
    $artist_ids_query = $conn->prepare("SELECT artist_id FROM group_artists WHERE group_id = ?");
    $artist_ids_query->bind_param("i", $group_id);
    $artist_ids_query->execute();
    $artist_ids_result = $artist_ids_query->get_result();
    $artist_ids = [];
    while ($row = $artist_ids_result->fetch_assoc()) {
        $artist_ids[] = $row['artist_id'];
    }
    $artist_ids_query->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Edit Group</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-md mx-auto px-4">
            <!-- Group Edit Form -->
            <form action="admin-group-profile.php?group_id=<?= $group_id ?>" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="public/<?= htmlspecialchars($group['main_media']) ?>" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Group Image">
                    <input type="file" name="main_media" id="main_media" class="mb-4" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="mb-4">
                    <label for="group_name" class="block text-sm font-medium text-gray-700">Group Name</label>
                    <input type="text" name="group_name" id="group_name" value="<?= htmlspecialchars($group['group_name']) ?>" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($group['description']) ?></textarea>
                </div>
                <!-- Dropdown for Collections -->
                <div class="mb-4">
                    <label for="collection_id" class="block text-sm font-medium text-gray-700">Select Collection</label>
                    <select name="collection_id" id="collection_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">-- Select a Collection --</option>
                        <?php
                        $collections_query = $conn->query("SELECT collection_id, collection_name FROM collections");
                        while ($collection = $collections_query->fetch_assoc()):
                        ?>
                            <option value="<?= $collection['collection_id'] ?>" <?= $collection['collection_id'] == $group['collection_id'] ? 'selected' : '' ?>><?= htmlspecialchars($collection['collection_name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- Artist Members Checklist -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Members (Artists)</label>
                    <div class="mt-2 grid grid-cols-2 gap-4">
                        <?php
                        $artists_query = $conn->query("SELECT artist_id, name FROM artists");
                        while ($artist = $artists_query->fetch_assoc()):
                            $checked = in_array($artist['artist_id'], $artist_ids) ? 'checked' : '';
                        ?>
                            <div class="flex items-center">
                                <input type="checkbox" name="artist_ids[]" value="<?= $artist['artist_id'] ?>" 
                                    id="artist_<?= $artist['artist_id'] ?>" 
                                    class="mr-2" <?= $checked ?>>
                                <label for="artist_<?= $artist['artist_id'] ?>"><?= htmlspecialchars($artist['name']) ?></label>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-maroon rounded-md">Update Group</button>
                    <a href="admin-dashboard.php" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('imagePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
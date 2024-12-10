<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $group_name = $_POST['group_name'];
    $description = $_POST['description'];
    $main_media = $_FILES['main_media'];
    $artist_ids = isset($_POST['artist_ids']) ? $_POST['artist_ids'] : [];

    // Validate inputs
    if (empty($group_name) || empty($description) || !$main_media['tmp_name']) {
        die("Error: All fields are required.");
    }

    // Handle file upload for main_media
    $media_target_dir = "public/";
    if (!is_dir($media_target_dir)) {
        mkdir($media_target_dir, 0777, true); // Ensure the directory exists
    }
    $media_file_name = uniqid() . "_" . basename($main_media['name']);
    $media_target_file = $media_target_dir . $media_file_name;

    if (move_uploaded_file($main_media['tmp_name'], $media_target_file)) {
        // Insert group details into `groups` table
        $query = $conn->prepare("INSERT INTO groups (group_name, description, main_media) VALUES (?, ?, ?)");
        $query->bind_param("sss", $group_name, $description, $media_file_name);

        if ($query->execute()) {
            $group_id = $query->insert_id; // Get the newly inserted group ID

            // Insert group members into `group_artists`
            if (!empty($artist_ids)) {
                $group_artist_query = $conn->prepare("INSERT INTO group_artists (group_id, artist_id) VALUES (?, ?)");
                foreach ($artist_ids as $artist_id) {
                    $group_artist_query->bind_param("ii", $group_id, $artist_id);
                    $group_artist_query->execute();
                }
                $group_artist_query->close();
            }

            header("Location: admin-dashboard.php?message=Group uploaded successfully");
            exit();
        } else {
            echo "Error: Unable to upload group. " . $conn->error;
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
    <title>CCA | Upload Group</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-md mx-auto px-4">
            <!-- Group Upload Form -->
            <form action="upload-group.php" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="public/person-placeholder.jpg" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Group Image">
                    <input type="file" name="main_media" id="main_media" class="mb-4" accept="image/*" onchange="previewImage(event)" required>
                </div>
                <div class="mb-4">
                    <label for="group_name" class="block text-sm font-medium text-gray-700">Group Name</label>
                    <input type="text" name="group_name" id="group_name" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Members (Artists)</label>
                    <div class="mt-2 grid grid-cols-2 gap-4">
                        <?php
                        $artists_query = $conn->query("SELECT artist_id, name FROM artists");
                        while ($artist = $artists_query->fetch_assoc()):
                        ?>
                            <div class="flex items-center">
                                <input type="checkbox" name="artist_ids[]" value="<?= $artist['artist_id'] ?>" 
                                    id="artist_<?= $artist['artist_id'] ?>" 
                                    class="mr-2">
                                <label for="artist_<?= $artist['artist_id'] ?>"><?= htmlspecialchars($artist['name']) ?></label>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-maroon rounded-md">Save Group</button>
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

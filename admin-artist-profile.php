<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Artist Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <?php

    if (isset($_GET['artist_id'])) {
        $artist_id = intval($_GET['artist_id']);
        
        // Fetch artist data
        $artist_query = $conn->prepare("SELECT * FROM artists WHERE artist_id = ?");
        $artist_query->bind_param("i", $artist_id);
        $artist_query->execute();
        $artist = $artist_query->get_result()->fetch_assoc();
        
        // Fetch departments
        $departments_query = $conn->query("SELECT department_id, department_name FROM departments");
        
        
        // Update artist info
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = htmlspecialchars($_POST['name']);
                $bio = htmlspecialchars($_POST['bio']);
                $department_id = intval($_POST['department_id']);
                $target_dir = "public/";

                // Handle image upload
                $image_path = $artist['main_media']; // Retain existing image by default
                if (!empty($_FILES['image']['tmp_name'])) {
                    $file_type = mime_content_type($_FILES['image']['tmp_name']);
                    if (!in_array($file_type, ['image/jpeg', 'image/png'])) {
                        throw new Exception("Invalid image type. Only JPEG and PNG are allowed.");
                    }
                    $image_path = $target_dir . uniqid() . "-" . basename($_FILES['image']['name']);
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                        throw new Exception("Image upload failed.");
                    }
                }

                // Update query
                $update_query = $conn->prepare("UPDATE artists SET name = ?, bio = ?, department_id = ?, main_media = ? WHERE artist_id = ?");
                $update_query->bind_param("ssisi", $name, $bio, $department_id, $image_path, $artist_id);
                if (!$update_query->execute()) {
                    throw new Exception("Database error: " . $conn->error);
                }
                header("Location: admin-artists.php?artist_id=$artist_id&message=Profile updated successfully");
                exit;
            } catch (Exception $e) {
                echo "<p class='text-red-500'>Error: " . $e->getMessage() . "</p>";
            }
        }
    } else {
        die("Artist ID not provided.");
    }
    ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Artist Info Form -->
            <form action="admin-artist-profile.php?artist_id=<?= $artist_id ?>" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <div class="flex flex-col items-center">
                    <img src="<?= htmlspecialchars($artist['main_media'] ?? 'public/person-placeholder.jpg') ?>" class="w-64 h-64 object-cover mb-4 rounded-md">
                    <input type="file" name="image" id="image" class="mb-4">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="<?= htmlspecialchars($artist['name']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                    <textarea name="bio" id="bio" rows="5" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($artist['bio']) ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" id="department_id" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <?php while ($department = $departments_query->fetch_assoc()): ?>
                            <option value="<?= $department['department_id'] ?>" <?= $department['department_id'] == $artist['department_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($department['department_name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-blue rounded-md">Save Changes</button>
                    <a href="admin-artists.php" class="px-6 py-2 text-uphsl-blue border border-uphsl-maroon rounded-md hover:bg-uphsl-blue hover:text-uphsl-blue text-center">Cancel</a>
                </div>
            </form>
        </div>
    </section>

</body>
</html>

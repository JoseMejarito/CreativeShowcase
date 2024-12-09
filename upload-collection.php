<?php
require 'connection.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $collection_name = $_POST['collection_name'];
    $description = $_POST['description'];
    $main_media = '';

    // Handle the file upload
    if (!empty($_FILES['main_media']['name'])) {
        $target_dir = "public/";
        $target_file = $target_dir . uniqid() . '_' . basename($_FILES['main_media']['name']);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type (allow jpg, jpeg, png, gif)
        if (in_array($file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['main_media']['tmp_name'], $target_file)) {
                $main_media = $target_file;
            } else {
                $message = "Error: Unable to upload image.";
            }
        } else {
            $message = "Error: Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    }

    if (empty($message)) {
        $query = $conn->prepare("INSERT INTO collections (main_media, collection_name, description) VALUES (?, ?, ?)");
        $query->bind_param("sss", $main_media, $collection_name, $description);

        if ($query->execute()) {
            header("Location: admin-collections.php?message=Collection uploaded successfully");
            exit;
        } else {
            $message = "Error: Unable to upload collection.";
        }

        $query->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Upload Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-md mx-auto px-4">
            <!-- Collection Upload Form -->
            <form action="upload-collection.php" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <?php if (!empty($message)): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="public/default-image.jpg" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Collection Image">
                    <input type="file" name="main_media" id="main_media" class="mb-4" accept="image/*" onchange="previewImage(event)" required>
                </div>

                <div class="mb-4">
                    <label for="collection_name" class="block text-sm font-medium text-gray-700">Collection Name</label>
                    <input type="text" name="collection_name" id="collection_name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-blue rounded-md">Save Collection</button>
                    <a href="admin-collections.php" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
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

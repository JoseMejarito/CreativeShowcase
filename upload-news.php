<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data and sanitize
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $author = htmlspecialchars($_POST['author']);

        // Upload directory
        $target_dir = "public/";

        
        // Function to validate and upload files
        function handleFileUpload($file, $allowedTypes, $isRequired = false) {
            global $target_dir;
            if ($isRequired && empty($file['tmp_name'])) {
                throw new Exception("Required file is missing.");
            }
            if (!empty($file['tmp_name'])) {
                $fileType = mime_content_type($file['tmp_name']);
                if (!in_array($fileType, $allowedTypes)) {
                    throw new Exception("Invalid file type ($fileType).");
                }
                $filePath = $target_dir . uniqid() . "-" . basename($file["name"]);
                if (!move_uploaded_file($file["tmp_name"], $filePath)) {
                    throw new Exception("Failed to upload file: " . $file['name']);
                }
                return $filePath;
            }
            return null;
        }

        // Handle main image upload (required)
        $main_image_path = handleFileUpload(
            $_FILES['main_image'],
            ['image/jpeg', 'image/png', 'image/gif'],
            true
        );

        // Handle sub media uploads (optional)
        $allowedSubMediaTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
        $sub_image1_path = handleFileUpload($_FILES['sub_image1'], $allowedSubMediaTypes);
        $sub_image2_path = handleFileUpload($_FILES['sub_image2'], $allowedSubMediaTypes);
        $sub_image3_path = handleFileUpload($_FILES['sub_image3'], $allowedSubMediaTypes);

        // Insert the news into the database
        $query = $conn->prepare("INSERT INTO news (title, author, content, main_media, sub_media1, sub_media2, sub_media3) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("sssssss", $title, $author, $content, $main_image_path, $sub_image1_path, $sub_image2_path, $sub_image3_path);

        if ($query->execute()) {
            header("Location: admin-news.php?message=News uploaded successfully");
            exit;
        } else {
            throw new Exception("Database error: " . $conn->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Upload News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- News Upload Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Title -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Upload News</h1>

                <!-- Form for Uploading News -->
                <form action="upload-news.php" method="POST" enctype="multipart/form-data">
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <!-- Author Input -->
                    <div class="mb-4">
                        <label for="author" class="block text-lg font-semibold text-gray-700">Author</label>
                        <input type="text" id="author" name="author" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <!-- Content Textarea -->
                    <div class="mb-4">
                        <label for="content" class="block text-lg font-semibold text-gray-700">Content</label>
                        <textarea id="content" name="content" rows="6" class="w-full p-4 rounded-lg border" required></textarea>
                    </div>

                    <!-- Main Image Upload (Only images, required) -->
                    <div class="mb-4">
                        <label for="main_image" class="block text-lg font-semibold text-gray-700">Main Image (Required)</label>
                        <input type="file" id="main_image" name="main_image" class="w-full p-4 rounded-lg border" accept="image/*" required>
                    </div>

                    <!-- Sub Media Image/Video Uploads (Optional) -->
                    <div class="mb-4">
                        <label for="sub_image1" class="block text-lg font-semibold text-gray-700">Sub Media Image/Video 1 (Required)</label>
                        <input type="file" id="sub_image1" name="sub_image1" class="w-full p-4 rounded-lg border" accept="image/*,video/*">
                    </div>

                    <div class="mb-4">
                        <label for="sub_image2" class="block text-lg font-semibold text-gray-700">Sub Media Image/Video 2 (Optional)</label>
                        <input type="file" id="sub_image2" name="sub_image2" class="w-full p-4 rounded-lg border" accept="image/*,video/*">
                    </div>

                    <div class="mb-4">
                        <label for="sub_image3" class="block text-lg font-semibold text-gray-700">Sub Media Image/Video 3 (Optional)</label>
                        <input type="file" id="sub_image3" name="sub_image3" class="w-full p-4 rounded-lg border" accept="image/*,video/*">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-uphsl-blue text-white py-3 px-6 rounded-md hover:bg-uphsl-blue">Upload News</button>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
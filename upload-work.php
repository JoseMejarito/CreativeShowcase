<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data and sanitize
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);

        // Fetch selected collections and groups
        $collections = $_POST['collections'] ?? [];
        $groups = $_POST['groups'] ?? [];

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
        $sub_media_paths = [];
        for ($i = 1; $i <= 3; $i++) {
            $sub_media_paths[] = handleFileUpload($_FILES['sub_media' . $i], $allowedSubMediaTypes);
        }

        // Insert the work into the database
        $query = $conn->prepare("INSERT INTO works (title, description, main_media, sub_media1, sub_media2, sub_media3) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssssss", $title, $description, $main_image_path, $sub_media_paths[0], $sub_media_paths[1], $sub_media_paths[2]);

        if (!$query->execute()) {
            throw new Exception("Database error: " . $conn->error);
        }

        $work_id = $conn->insert_id;

        // Link work to collections
        foreach ($collections as $collection_id) {
            $conn->query("INSERT INTO works_collections (work_id, collection_id) VALUES ($work_id, $collection_id)");
        }

        // Link work to groups
        foreach ($groups as $group_id) {
            $conn->query("INSERT INTO work_groups (work_id, group_id) VALUES ($work_id, $group_id)");
        }

        header("Location: admin-works.php?message=Work uploaded successfully");
        exit;
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
    <title>CCA | Upload Works</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
        function previewMedia(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById(previewId).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Upload Work</h1>

                <form action="upload-work.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="w-full p-4 rounded-lg border" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-lg font-semibold text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="6" class="w-full p-4 rounded-lg border" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="main_image" class="block text-lg font-semibold text-gray-700">Main Image (Required)</label>
                        <input type="file" id="main_image" name="main_image" class="w-full p-4 rounded-lg border" accept="image/*" onchange="previewMedia(this, 'main_image_preview')" required>
                        <img id="main_image_preview" class="mt-4 w-full max-h-60 object-contain">
                    </div>

                    <div class="mb-4">
                        <label for="sub_media1" class="block text-lg font-semibold text-gray-700">Sub Media 1</label>
                        <input type="file" id="sub_media1" name="sub_media1" class="w-full p-4 rounded-lg border" accept="image/*,video/*" onchange="previewMedia(this, 'sub_media1_preview')">
                        <img id="sub_media1_preview" class="mt-4 w-full max-h-60 object-contain">
                    </div>

                    <div class="mb-4">
                        <label for="sub_media2" class="block text-lg font-semibold text-gray-700">Sub Media 2</label>
                        <input type="file" id="sub_media2" name="sub_media2" class="w-full p-4 rounded-lg border" accept="image/*,video/*" onchange="previewMedia(this, 'sub_media2_preview')">
                        <img id="sub_media2_preview" class="mt-4 w-full max-h-60 object-contain">
                    </div>

                    <div class="mb-4">
                        <label for="sub_media3" class="block text-lg font-semibold text-gray-700">Sub Media 3</label>
                        <input type="file" id="sub_media3" name="sub_media3" class="w-full p-4 rounded-lg border" accept="image/*,video/*" onchange="previewMedia(this, 'sub_media3_preview')">
                        <img id="sub_media3_preview" class="mt-4 w-full max-h-60 object-contain">
                    </div>

                    <div class="mb-4">
                        <label class="block text-lg font-semibold text-gray-700">Collections</label>
                        <?php
                        $collections = $conn->query("SELECT * FROM collections");
                        while ($row = $collections->fetch_assoc()): ?>
                            <div>
                                <input type="checkbox" name="collections[]" value="<?php echo $row['collection_id']; ?>">
                                <label><?php echo htmlspecialchars($row['collection_name']); ?></label>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="mb-4">
                        <label class="block text-lg font-semibold text-gray-700">Performers (Groups)</label>
                        <?php
                        $groups = $conn->query("SELECT * FROM groups");
                        while ($row = $groups->fetch_assoc()): ?>
                            <div>
                                <input type="checkbox" name="groups[]" value="<?php echo $row['group_id']; ?>">
                                <label><?php echo htmlspecialchars($row['group_name']); ?></label>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <button type="submit" class="bg-uphsl-blue text-white py-3 px-6 rounded-md hover:bg-uphsl-blue">Upload Work</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

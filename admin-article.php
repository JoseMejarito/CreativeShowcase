<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Edit Article</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this article?");
        }
    </script>
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <?php

    // Check if the news ID is provided
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = $conn->prepare("SELECT * FROM news WHERE news_id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $news = $result->fetch_assoc();

        if (!$news) {
            die("No news article found with the provided ID.");
        }
    } else {
        die("News ID not provided.");
    }

    // Handle form submission for updates
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Get updated values
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $author = htmlspecialchars($_POST['author']);
            $target_dir = "public/";

            // Function to handle media upload
            function handleFileUpload($file, $allowedTypes, $existingFile) {
                global $target_dir;
                if (!empty($file['tmp_name'])) {
                    $fileType = mime_content_type($file['tmp_name']);
                    if (!in_array($fileType, $allowedTypes)) {
                        throw new Exception("Invalid file type: " . $fileType);
                    }

                    // Optional: Check file size here (e.g., 5MB max)
                    if ($file['size'] > 5 * 1024 * 1024) {
                        throw new Exception("File size exceeds the maximum allowed size of 5MB.");
                    }

                    // Generate unique file path
                    $filePath = $target_dir . uniqid() . "-" . basename($file["name"]);
                    if (move_uploaded_file($file["tmp_name"], $filePath)) {
                        return $filePath;
                    } else {
                        throw new Exception("Failed to upload file: " . $file['name']);
                    }
                }
                return $existingFile; // If no new upload, keep the existing file
            }

            // Handle main media
            $main_media = handleFileUpload($_FILES['main_media'], ['image/jpeg', 'image/png'], $news['main_media']);
            $sub_media1 = handleFileUpload($_FILES['sub_media1'], ['image/jpeg', 'image/png'], $news['sub_media1']);
            $sub_media2 = handleFileUpload($_FILES['sub_media2'], ['image/jpeg', 'image/png'], $news['sub_media2']);
            $sub_media3 = handleFileUpload($_FILES['sub_media3'], ['image/jpeg', 'image/png'], $news['sub_media3']);

            // Update query (corrected column name `news_id`)
            $updateQuery = $conn->prepare("UPDATE news SET title = ?, content = ?, author = ?, main_media = ?, sub_media1 = ?, sub_media2 = ?, sub_media3 = ? WHERE news_id = ?");
            $updateQuery->bind_param("sssssssi", $title, $content, $author, $main_media, $sub_media1, $sub_media2, $sub_media3, $id);

            if ($updateQuery->execute()) {
                header("Location: admin-news.php?message=News updated successfully");
                exit;
            } else {
                throw new Exception("Database error: " . $conn->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <!-- HTML Form for Editing News -->
    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <form action="admin-article.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Article Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Edit News Article</h1>

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="<?= htmlspecialchars($news['title']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Author -->
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" value="<?= htmlspecialchars($news['author']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="5" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?= htmlspecialchars($news['content']) ?></textarea>
                </div>

                <!-- Main Media -->
                <div class="mb-4">
                    <label for="main_media" class="block text-sm font-medium text-gray-700">Main Media</label>
                    <input type="file" name="main_media" id="main_media" 
                        class="mt-1 block w-full text-sm text-gray-500">
                    <?php if ($news['main_media']): ?>
                        <img src="<?= $news['main_media'] ?>" alt="Main Media" class="mt-2 w-full h-auto object-cover rounded-md">
                    <?php endif; ?>
                </div>

                <!-- Sub Media -->
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <div class="mb-6 w-full md:w-1/3">
                            <label for="sub_media<?= $i ?>" class="block text-sm font-medium text-gray-700">Sub Media <?= $i ?></label>
                            <input type="file" name="sub_media<?= $i ?>" id="sub_media<?= $i ?>" 
                                class="mt-1 block w-full text-sm text-gray-500">
                            <?php if ($news["sub_media$i"]): ?>
                                <img src="<?= $news["sub_media$i"] ?>" alt="Sub Media <?= $i ?>" 
                                    class="mt-2 w-full h-auto object-cover rounded-md">
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="admin-news.php" 
                    class="px-6 py-2 text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-md">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 text-white bg-uphsl-maroon hover:bg-uphsl-maroon-dark rounded-md">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>
<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this event?");
        }
    </script>
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <?php
    if (isset($_GET['event_id'])) {
        $id = intval($_GET['event_id']);
        $query = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $event = $result->fetch_assoc();

        if (!$event) {
            die("No event found with the provided ID.");
        }
    } else {
        die("Event ID not provided.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $start_date = htmlspecialchars($_POST['start_date']);
            $end_date = htmlspecialchars($_POST['end_date']);
            $location = htmlspecialchars($_POST['location']);
            $target_dir = "public/";

            function handleFileUpload($file, $allowedTypes, $existingFile) {
                global $target_dir;
                if (!empty($file['tmp_name'])) {
                    $fileType = mime_content_type($file['tmp_name']);
                    if (!in_array($fileType, $allowedTypes)) {
                        throw new Exception("Invalid file type: " . $fileType);
                    }
                    if ($file['size'] > 5 * 1024 * 1024) {
                        throw new Exception("File size exceeds the maximum allowed size of 5MB.");
                    }
                    $filePath = $target_dir . uniqid() . "-" . basename($file["name"]);
                    if (move_uploaded_file($file["tmp_name"], $filePath)) {
                        return $filePath;
                    } else {
                        throw new Exception("Failed to upload file: " . $file['name']);
                    }
                }
                return $existingFile;
            }

            $banner_image = handleFileUpload($_FILES['banner_image'], ['image/jpeg', 'image/png'], $event['banner_image']);

            $updateQuery = $conn->prepare("UPDATE events SET title = ?, description = ?, start_date = ?, end_date = ?, location = ?, banner_image = ? WHERE event_id = ?");
            $updateQuery->bind_param("ssssssi", $title, $description, $start_date, $end_date, $location, $banner_image, $id);

            if ($updateQuery->execute()) {
                header("Location: admin-events.php?message=Event updated successfully");
                exit;
            } else {
                throw new Exception("Database error: " . $conn->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <form action="admin-edit-event.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Edit Event</h1>

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="<?= htmlspecialchars($event['title']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"><?= htmlspecialchars($event['description']) ?></textarea>
                </div>

                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="<?= htmlspecialchars($event['start_date']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="<?= htmlspecialchars($event['end_date']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="<?= htmlspecialchars($event['location']) ?>" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="banner_image" class="block text-sm font-medium text-gray-700">Banner Image</label>
                    <input type="file" name="banner_image" id="banner_image" 
                        class="mt-1 block w-full text-sm text-gray-500">
                    <?php if ($event['banner_image']): ?>
                        <img src="<?= $event['banner_image'] ?>" alt="Banner Image" class="mt-2 w-full h-auto object-cover rounded-md">
                    <?php endif; ?>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="admin-events.php" class="px-6 py-2 text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-md">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-maroon hover:bg-uphsl-maroon-dark rounded-md">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>

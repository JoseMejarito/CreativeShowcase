<?php
// Include your database connection
include 'db_connection.php'; // Make sure you have a file with database connection details

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form inputs
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $date_posted = date('Y-m-d H:i:s'); // Get the current date and time

    // Handle the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "public/"; // Folder to store uploaded images
        $imageName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . uniqid() . '_' . $imageName; // Create a unique name

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            // Insert data into the `news_events` table
            $sql = "INSERT INTO news_events (title, content, date_posted) VALUES ('$title', '$content', '$date_posted')";
            if ($conn->query($sql) === TRUE) {
                // Get the ID of the newly inserted news event
                $event_id = $conn->insert_id;

                // Insert image details into the `media` table
                $mediaSql = "INSERT INTO media (related_id, related_table, file_path, media_type) VALUES ('$event_id', 'news_events', '$targetFilePath', 'image')";
                if ($conn->query($mediaSql) === TRUE) {
                    echo "News and image uploaded successfully!";
                } else {
                    echo "Error uploading image: " . $conn->error;
                }
            } else {
                echo "Error uploading news: " . $conn->error;
            }
        } else {
            echo "Error uploading image file.";
        }
    } else {
        echo "No image uploaded or an error occurred.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  
</head>
<body class="bg-gray-100 anton-regular">
    <div class="max-w-xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Upload News</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="title" class="block text-lg font-semibold">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md" required>
            </div>
            <div>
                <label for="content" class="block text-lg font-semibold">Content</label>
                <textarea id="content" name="content" rows="5" class="w-full px-4 py-2 border rounded-md" required></textarea>
            </div>
            <div>
                <label for="image" class="block text-lg font-semibold">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full py-2">
            </div>
            <button type="submit" class="bg-uphsl-blue text-white px-6 py-3 rounded-md">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Retrieve input values
        $name = htmlspecialchars($_POST['name']);
        $bio = htmlspecialchars($_POST['bio']);
        $department_id = intval($_POST['department_id']); 
        $target_dir = "public/";

        // Handle image upload
        $image_path = null; // Default value if no image is uploaded
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

        // Insert artist data into the database
        $query = $conn->prepare("INSERT INTO artists (name, bio, main_media, department_id) VALUES (?, ?, ?, ?)");
        $query->bind_param("sssi", $name, $bio, $image_path, $department_id);

        if ($query->execute()) {
            header("Location: admin-artists.php?message=Artist uploaded successfully");
            exit;
        } else {
            throw new Exception("Error: Unable to upload artist.");
        }
    } catch (Exception $e) {
        echo "<p class='text-red-500'>Error: " . $e->getMessage() . "</p>";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Upload Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-md mx-auto px-4">
            <!-- Artist Info Form -->
            <form action="upload-artist.php" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="public/person-placeholder.jpg" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Artist Image">
                    <input type="file" name="image" id="image" class="mb-4" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                    <textarea name="bio" id="bio" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>
                <div class="mb-4">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                    <select name="department_id" id="department_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <?php
                        $departments_query = $conn->query("SELECT department_id, department_name FROM departments");
                        while ($department = $departments_query->fetch_assoc()):
                        ?>
                            <option value="<?= $department['department_id'] ?>"><?= htmlspecialchars($department['department_name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-maroon rounded-md">Save Changes</button>
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

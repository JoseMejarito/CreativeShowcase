<?php 
include 'connection.php';

$message = ''; // To display error or success messages

// Check if `collection_id` is passed in the URL
if (!isset($_GET['collection_id'])) {
    die('Collection ID is required');
}

$collection_id = (int)$_GET['collection_id'];

// Fetch collection data
$query = $conn->prepare("SELECT main_media, collection_name, description FROM collections WHERE collection_id = ?");
$query->bind_param("i", $collection_id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    die('Collection not found');
}

$collection = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $collection_name = $_POST['collection_name'];
    $description = $_POST['description'];
    $main_media = $collection['main_media']; // Default to existing media

    // Handle media upload if a new file is uploaded
    if (isset($_FILES['main_media']) && $_FILES['main_media']['error'] === UPLOAD_ERR_OK) {
        $uploads_dir = 'public';
        $tmp_name = $_FILES['main_media']['tmp_name'];
        $new_filename = uniqid() . '-' . basename($_FILES['main_media']['name']);
        $main_media = $uploads_dir . '/' . $new_filename;

        if (!move_uploaded_file($tmp_name, $main_media)) {
            $message = 'Failed to upload the image.';
        }
    }

    // Update the collection in the database
    $update_query = $conn->prepare("UPDATE collections SET collection_name = ?, description = ?, main_media = ? WHERE collection_id = ?");
    $update_query->bind_param("sssi", $collection_name, $description, $main_media, $collection_id);

    if ($update_query->execute()) {
        header("Location: admin-collections.php?message=Collection updated successfully");
        exit;
    } else {
        $message = 'Failed to update the collection.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Edit Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>
    
    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-md mx-auto px-4">
            <!-- Collection Edit Form -->
            <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-5 rounded-lg shadow-lg">
                <?php if (!empty($message)): ?>
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <?= htmlspecialchars($message) ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col items-center mb-6">
                    <img id="imagePreview" src="<?= htmlspecialchars($collection['main_media']) ?>" 
                         class="w-64 h-64 object-cover mb-4 rounded-md" alt="Collection Image">
                    <input type="file" name="main_media" id="main_media" class="mb-4" accept="image/*" onchange="previewImage(event)">
                </div>

                <div class="mb-4">
                    <label for="collection_name" class="block text-sm font-medium text-gray-700">Collection Name</label>
                    <input type="text" name="collection_name" id="collection_name" value="<?= htmlspecialchars($collection['collection_name']) ?>" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($collection['description']) ?></textarea>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-6 py-2 text-white bg-uphsl-blue rounded-md">Update Collection</button>
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

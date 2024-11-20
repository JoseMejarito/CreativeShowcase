<?php
include 'connection.php';
include 'upload.php';

// Fetch categories for dropdowns (e.g., for news and works)
$news_category_sql = "SELECT category_id, category_name FROM posting_categories";
$news_category_result = $conn->query($news_category_sql);

// Fetch works categories for dropdown (optional)
$works_category_sql = "SELECT category_id, category_name FROM posting_categories"; 
$works_category_result = $conn->query($works_category_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle Artist Upload
    if (isset($_POST['add_artist'])) {
        $artist_name = $_POST['artist_name'];
        $artist_bio = $_POST['artist_bio'];
        $social_link = $_POST['social_link'];

        // Handle artist image upload
        $artist_image = uploadFile('artist_image', 'public/');
        
        $sql = "INSERT INTO artists (name, bio, social_link, image) VALUES ('$artist_name', '$artist_bio', '$social_link', '$artist_image')";
        if ($conn->query($sql)) {
            echo "Artist uploaded successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Handle News/Event Upload
    if (isset($_POST['add_news_event'])) {
        $news_title = $_POST['news_title'];
        $news_content = $_POST['news_content'];
        $news_category_id = $_POST['news_category_id'];

        // Handle image and video uploads
        $image_paths = uploadMultipleFiles('news_images', 'public/');
        $video_paths = uploadMultipleFiles('news_videos', 'public/');

        // Insert news into database
        $sql = "INSERT INTO postings (title, content, category_id, type) VALUES ('$news_title', '$news_content', '$news_category_id', 'news')";
        if ($conn->query($sql)) {
            $post_id = $conn->insert_id; // Get the ID of the inserted post

            // Insert image paths into media table
            foreach ($image_paths as $image_path) {
                $sql_media = "INSERT INTO media (related_id, related_table, media_type, file_path) VALUES ('$post_id', 'postings', 'image', '$image_path')";
                $conn->query($sql_media);
            }

            // Insert video paths into media table
            foreach ($video_paths as $video_path) {
                $sql_media = "INSERT INTO media (related_id, related_table, media_type, file_path) VALUES ('$post_id', 'postings', 'video', '$video_path')";
                $conn->query($sql_media);
            }

            echo "News/Event uploaded successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular">
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-3xl font-bold text-center mb-6 text-uphsl-blue">Admin Upload</h1>

        <!-- Artist Upload Form -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-uphsl-maroon mb-4">Add Artist</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="add_artist">
                <div>
                    <label for="artist_name" class="block text-sm font-medium text-gray-700">Artist Name</label>
                    <input type="text" name="artist_name" required class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="artist_bio" class="block text-sm font-medium text-gray-700">Artist Bio</label>
                    <textarea name="artist_bio" class="w-full p-2 border rounded"></textarea>
                </div>
                <div>
                    <label for="social_link" class="block text-sm font-medium text-gray-700">Social Link</label>
                    <input type="text" name="social_link" class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="artist_image" class="block text-sm font-medium text-gray-700">Artist Image</label>
                    <input type="file" name="artist_image" accept="image/*" required class="w-full p-2 border rounded" />
                </div>
                <button type="submit" class="w-full p-2 bg-uphsl-blue text-uphsl-yellow rounded">Upload Artist</button>
            </form>
        </div>

        <!-- Work Upload Form -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-uphsl-maroon mb-4">Add Work</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="add_work">
                <div>
                    <label for="work_title" class="block text-sm font-medium text-gray-700">Work Title</label>
                    <input type="text" name="work_title" required class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="work_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="work_description" class="w-full p-2 border rounded"></textarea>
                </div>
                <div>
                    <label for="work_category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="work_category_id" required class="w-full p-2 border rounded">
                        <option value="">Select Work Category</option>
                        <?php while ($row = $works_category_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <label for="work_images" class="block text-sm font-medium text-gray-700">Images</label>
                    <input type="file" name="work_images[]" multiple accept="image/*" class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="work_videos" class="block text-sm font-medium text-gray-700">Videos</label>
                    <input type="file" name="work_videos[]" multiple accept="video/*" class="w-full p-2 border rounded" />
                </div>
                <button type="submit" class="w-full p-2 bg-uphsl-blue text-uphsl-yellow rounded">Upload Work</button>
            </form>
        </div>

        <!-- News/Event Upload Form -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-uphsl-maroon mb-4">Add News/Event</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="add_news_event">
                <div>
                    <label for="news_title" class="block text-sm font-medium text-gray-700">News/Event Title</label>
                    <input type="text" name="news_title" required class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="news_content" class="block text-sm font-medium text-gray-700">News/Event Content</label>
                    <textarea name="news_content" class="w-full p-2 border rounded"></textarea>
                </div>
                <div>
                    <label for="news_category_id" class="block text-sm font-medium text-gray-700">News Category</label>
                    <select name="news_category_id" required class="w-full p-2 border rounded">
                        <option value="">Select News Category</option>
                        <?php while ($row = $news_category_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <label for="news_images" class="block text-sm font-medium text-gray-700">News/Event Images</label>
                    <input type="file" name="news_images[]" multiple accept="image/*" class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="news_videos" class="block text-sm font-medium text-gray-700">News/Event Videos</label>
                    <input type="file" name="news_videos[]" multiple accept="video/*" class="w-full p-2 border rounded" />
                </div>
                <button type="submit" class="w-full p-2 bg-uphsl-blue text-uphsl-yellow rounded">Upload News/Event</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Helper function to handle file uploads
function uploadFile($input_name, $target_dir) {
    if ($_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES[$input_name]['tmp_name'];
        $name = uniqid() . '-' . basename($_FILES[$input_name]['name']);
        $target_file = $target_dir . $name;

        if (move_uploaded_file($tmp_name, $target_file)) {
            return $target_file;
        }
    }
    return null;
}

// Helper function to handle multiple file uploads
function uploadMultipleFiles($input_name, $target_dir) {
    $file_paths = [];
    foreach ($_FILES[$input_name]['tmp_name'] as $key => $tmp_name) {
        $name = uniqid() . '-' . basename($_FILES[$input_name]['name'][$key]);
        $target_file = $target_dir . $name;

        if (move_uploaded_file($tmp_name, $target_file)) {
            $file_paths[] = $target_file;
        }
    }
    return $file_paths;
}
?>

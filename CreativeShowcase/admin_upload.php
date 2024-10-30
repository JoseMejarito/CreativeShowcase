<?php
include 'connection.php';
include 'upload.php'
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
    <script>
        function previewMultipleImages(event, previewContainerId) {
            const previewContainer = document.getElementById(previewContainerId);
            previewContainer.innerHTML = '';
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('object-cover', 'rounded');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
            previewContainer.classList.remove('hidden');
        }

        function previewMultipleVideos(event, previewContainerId) {
            const previewContainer = document.getElementById(previewContainerId);
            previewContainer.innerHTML = '';
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const video = document.createElement('video');
                    video.src = e.target.result;
                    video.controls = true;
                    video.classList.add('object-cover', 'rounded');
                    previewContainer.appendChild(video);
                };
                reader.readAsDataURL(file);
            });
            previewContainer.classList.remove('hidden');
        }
    </script>
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
                    <input type="url" name="social_link" class="w-full p-2 border rounded" />
                </div>
                <div>
                    <label for="artist_image" class="block text-sm font-medium text-gray-700">Artist Image</label>
                    <input type="file" name="artist_image" accept="image/*" required class="w-full p-2 border rounded" />
                </div>
                <button type="submit" class="w-full p-2 bg-uphsl-blue text-uphsl-yellow rounded">Upload Artist</button>
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
                    <input type="file" name="news_images[]" multiple accept="image/*" class="w-full p-2 border rounded" onchange="previewMultipleImages(event, 'news-image-preview')" />
                    <div id="news-image-preview" class="image-preview hidden mt-2"></div>
                </div>
                <div>
                    <label for="news_videos" class="block text-sm font-medium text-gray-700">News/Event Videos</label>
                    <input type="file" name="news_videos[]" multiple accept="video/*" class="w-full p-2 border rounded" onchange="previewMultipleVideos(event, 'news-video-preview')" />
                    <div id="news-video-preview" class="video-preview hidden mt-2"></div>
                </div>
                <button type="submit" class="w-full p-2 bg-uphsl-blue text-uphsl-yellow rounded">Upload News/Event</button>
            </form>
        </div>
    </div>
</body>
</html>
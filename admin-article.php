<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Article</title>
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

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Article Content Section Spans Entire Width -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Article Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Edit Article</h1>

                <!-- Article Info Form -->
                <form action="update_article.php" method="POST" onsubmit="return confirmUpdate();">
                    <div class="flex justify-between text-sm text-gray-500 mb-6">
                        <div>
                            <label for="postDate" class="block">Posted on:</label>
                            <input type="date" id="postDate" name="postDate" value="2024-11-06" class="border rounded p-2" required>
                        </div>
                        <div>
                            <label for="author" class="block">Author:</label>
                            <input type="text" id="author" name="author" value="John Doe" class="border rounded p-2" required>
                        </div>
                    </div>

                    <!-- Editable Article Title -->
                    <div class="mb-6">
                        <label for="title" class="block">Article Title:</label>
                        <input type="text" id="title" name="title" value="Your Article Title Here" class="border rounded p-2 w-full" required>
                    </div>

                    <!-- Media Section (Image or Video) -->
                    <div class="mb-6 w-full">
                        <div class="w-full">
                            <label for="image" class="block">Article Image URL:</label>
                            <input type="text" id="image" name="image" value="public/cca-cover.png" class="border rounded p-2 w-full" required>
                            <img src="public/cca-cover.png" alt="Article Image" class="w-full h-full object-cover rounded-md mb-4 mt-2">
                        </div>
                        <div class="w-full">
                            <label for="video" class="block">Video Embed URL:</label>
                            <input type="text" id="video" name="video" value="https://www.youtube.com/embed/your-video-id" class="border rounded p-2 w-full" required>
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/your-video-id" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-md mt-2"></iframe>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="text-lg text-black leading-relaxed space-y-4">
                        <label for="content" class="block">Article Content:</label>
                        <textarea id="content" name="content" rows="10" class="border rounded p-2 w-full" required>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et nisi nec risus eleifend accumsan. Proin vel
                            massa nec ligula viverra tincidunt ac eget purus. Ut euismod varius orci, at varius mi dictum nec. Fusce vel leo
                            ut justo gravida interdum. Cras feugiat scelerisque urna, a volutpat lorem pellentesque eget. Nullam maximus, metus
                            eget dapibus tempus, lorem augue tempor odio, vel efficitur augue est in nunc.
                        </textarea>
                    </div>

                    <!-- Update Button -->
                    <div class="mt-6">
                        <button type="submit" class="bg-uphsl-maroon text-white px-4 py-2 rounded">Update Article</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
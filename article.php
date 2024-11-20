<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Article</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Article Content Section Spans Entire Width -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Article Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Event/News Title</h1>

                <!-- Article Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Posted on:</strong> November 6, 2024</p>
                    <p><strong>Author:</strong> John Doe</p>
                </div>

                <!-- Media Section (Image or Video) -->
                <div class="mb-6 w-full">
                    <div class="w-full">
                        <!-- Placeholder for Image -->
                        <img src="public/cca-cover.png" alt="Article Image" class="w-full h-full object-cover rounded-md mb-4">
                    </div>
                    <!-- Optional: Video Embed (use the iframe tag for YouTube, Vimeo, etc.) -->
                    <div class="w-full">
                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/your-video-id" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-md"></iframe>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="text-lg text-black leading-relaxed space-y-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et nisi nec risus eleifend accumsan. Proin vel
                        massa nec ligula viverra tincidunt ac eget purus. Ut euismod varius orci, at varius mi dictum nec. Fusce vel leo
                        ut justo gravida interdum. Cras feugiat scelerisque urna, a volutpat lorem pellentesque eget. Nullam maximus, metus
                        eget dapibus tempus, lorem augue tempor odio, vel efficitur augue est in nunc.
                    </p>

                    <p>
                        Morbi vulputate, arcu et sodales pretium, libero dui sodales nulla, in facilisis enim felis eget ante. In feugiat,
                        ante at convallis consequat, urna leo tincidunt urna, at sollicitudin mi elit vitae odio. Phasellus fringilla enim
                        vitae nibh pharetra, ac rhoncus arcu fermentum. Donec vehicula diam ac feugiat sodales.
                    </p>

                    <p>
                        Integer quis quam ac sapien laoreet lobortis in non leo. Sed vulputate, lorem sed ultricies vulputate, risus turpis
                        ultricies velit, nec dictum orci nunc a nulla. Aliquam erat volutpat. Aenean convallis enim et dui tristique, nec
                        vulputate urna interdum. Vivamus quis felis ut mi cursus cursus in nec orci.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
</body>
</html>
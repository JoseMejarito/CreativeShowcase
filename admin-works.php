<?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE ARTISTS' WORKS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Work</button>
        </div>
    </div>
    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="mt-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                   <!-- Work Item 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 1" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Abstract Landscape</h3>
                        <p class="text-md text-black mt-2 flex-grow">A beautiful depiction of nature in abstract forms and vivid colors.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>

                    <!-- Work Item 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 2" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Modern Portrait</h3>
                        <p class="text-md text-black mt-2 flex-grow">A portrait capturing raw emotion and expressive details.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>

                    <!-- Work Item 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 3" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Urban Impressions</h3>
                        <p class="text-md text-black mt-2 flex-grow">An artwork reflecting the dynamic energy of city life.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>
                </div>

                <!-- Pagination Links (Static for Now) -->
                <div class="mt-8 flex justify-center">
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Previous</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2 font-bold">1</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">2</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Next</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

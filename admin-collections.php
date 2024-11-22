<?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Collections</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE COLLECTIONS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Collection</button>
        </div>
    </div>
    <section id="collections" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Collection Item: Dance -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/collection-dance.jpg" alt="Dance" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Dance</h3>
                    <p class="text-md text-black mt-2 flex-grow">Explore breathtaking performances and movements captured through dance.</p>
                    <a href="#" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Collection Item: Music -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/collection-music.jpg" alt="Music" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Music</h3>
                    <p class="text-md text-black mt-2 flex-grow">Musical compositions and performances that highlight artistic talents and skills.</p>
                    <a href="#" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Collection Item: Acting -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/collection-acting.jpg" alt="Acting" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Theater</h3>
                    <p class="text-md text-black mt-2 flex-grow">A look into performances that bring stories to life.</p>
                    <a href="#" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="text-uphsl-yellow hover:underline">1</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">2</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">3</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</body>
</html>

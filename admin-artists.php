<?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Artists</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE ARTISTS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New News</button>
        </div>
    </div>
    <section id="exhibition" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
               
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 1" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 1</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 1's work or style. Their contribution to the exhibition is notable for its creativity and impact.</p>
                    <a href="artist-profile.php?id=1" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 2" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 2</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 2's work or style. Their unique approach has captivated audiences and added depth to the exhibition.</p>
                    <a href="artist-profile.php?id=2" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 3" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 3</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 3's work or style. Their pieces are known for their emotional resonance and striking visuals.</p>
                    <a href="artist-profile.php?id=3" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 4" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 4</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 4's innovative techniques and contributions to the exhibition, showcasing a unique perspective.</p>
                    <a href="artist-profile.php?id=4" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 5" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 5</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 5's distinctive style, blending cultural elements with contemporary design.</p>
                    <a href="artist-profile.php?id=5" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 6" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 6</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 6's compelling visual narrative and their impact on the exhibition's overall theme.</p>
                    <a href="artist-profile.php?id=6" class="text-uphsl-blue mt-4 inline-block">Read more</a>
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

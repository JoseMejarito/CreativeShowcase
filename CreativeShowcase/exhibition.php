<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Exhibition</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">ARTISTS' EXHIBITION</h1><br>
    </section>
    
    <section id="exhibition" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Featured Artists</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Artist 1 -->
                <a href="artist-profile.php?id=1" class="block bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="public/artist1.jpg" alt="Artist 1" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Artist Name 1</h3>
                    <p class="text-sm text-black mt-2">Description of artist 1's work or style. Their contribution to the exhibition is notable for its creativity and impact.</p>
                </a>
                
                <!-- Artist 2 -->
                <a href="artist-profile.php?id=2" class="block bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="public/artist2.jpg" alt="Artist 2" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Artist Name 2</h3>
                    <p class="text-sm text-black mt-2">Description of artist 2's work or style. Their unique approach has captivated audiences and added depth to the exhibition.</p>
                </a>
                
                <!-- Artist 3 -->
                <a href="artist-profile.php?id=3" class="block bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="public/artist3.jpg" alt="Artist 3" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Artist Name 3</h3>
                    <p class="text-sm text-black mt-2">Description of artist 3's work or style. Their pieces are known for their emotional resonance and striking visuals.</p>
                </a>
                
                <!-- Additional artists... -->
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

    <?php include 'footer.php'; ?>
</body>
</html>

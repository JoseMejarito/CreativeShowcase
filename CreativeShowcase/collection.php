<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Collections</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">COLLECTIONS</h1><br>
    </section>

    <section id="collections" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Explore Our Collections</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/collection-dance.jpg" alt="Dance" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Dance</h3>
                    <p class="text-sm text-black mt-2">Explore breathtaking performances and movements captured through various dance genres.</p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/collection-music.jpg" alt="Music" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Music</h3>
                    <p class="text-sm text-black mt-2">Discover musical compositions and performances that highlight artistic talent and skill.</p>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/collection-acting.jpg" alt="Acting" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Acting</h3>
                    <p class="text-sm text-black mt-2">A look into performances that bring stories to life, from drama to comedy.</p>
                </div>

                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/collection-photography.jpg" alt="Photography" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Photography</h3>
                    <p class="text-sm text-black mt-2">A collection of visually stunning photography, capturing moments and beauty.</p>
                </div>

                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/collection-videography.jpg" alt="Videography" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Videography</h3>
                    <p class="text-sm text-black mt-2">Showcasing works of video art and cinematography from various creators.</p>
                </div>

                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/collection-digitalart.jpg" alt="Digital Art" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Digital Art</h3>
                    <p class="text-sm text-black mt-2">A variety of digital artworks blending technology and creativity.</p>
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

    <?php include 'footer.php'; ?>
</body>
</html>

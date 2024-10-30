<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Artist Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">John Doe</h1><br>
    </section>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="public/artist_photo.jpg" alt="John Doe" class="w-full h-64 object-cover mb-4 rounded-md">
                <h3 class="text-2xl font-bold text-uphsl-maroon">Artist Biography</h3>
                <p class="text-black">John Doe is an artist known for his unique style, blending modern techniques with traditional forms. His works have been displayed worldwide.</p>

                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Social Links</h3>
                    <a href="https://instagram.com/artist" class="text-uphsl-blue hover:underline" target="_blank">Instagram</a>
                </div>
            </div>

            <div class="mt-10">
                <h2 class="text-3xl text-uphsl-yellow text-center mb-8">Works</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Work Item 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="public/work1.jpg" alt="Work 1" class="w-full h-48 object-cover mb-4 rounded-md">
                        <h3 class="text-2xl font-bold text-uphsl-maroon">Abstract Landscape</h3>
                        <p class="text-black mt-2">A beautiful depiction of nature in abstract forms and vivid colors.</p>
                    </div>
                    
                    <!-- Work Item 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="public/work2.jpg" alt="Work 2" class="w-full h-48 object-cover mb-4 rounded-md">
                        <h3 class="text-2xl font-bold text-uphsl-maroon">Modern Portrait</h3>
                        <p class="text-black mt-2">A portrait capturing raw emotion and expressive details.</p>
                    </div>

                    <!-- Work Item 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img src="public/work3.jpg" alt="Work 3" class="w-full h-48 object-cover mb-4 rounded-md">
                        <h3 class="text-2xl font-bold text-uphsl-maroon">Urban Impressions</h3>
                        <p class="text-black mt-2">An artwork reflecting the dynamic energy of city life.</p>
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

    <?php include 'footer.php'; ?>
</body>
</html>

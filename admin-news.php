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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE NEWS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New News</button>
        </div>
    </div>
    <section id="news-events" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Event Item 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 1" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 1</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 1, highlighting its key features and importance.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 2" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 2</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 2, focusing on what makes it special.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 3" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 3</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 3, providing key details for attendees.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 4 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 4" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 4</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 4, emphasizing its significance.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 5 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 5" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 5</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 5, detailing the activities involved.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 6 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 6" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Event Title 6</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of event 6, highlighting key speakers or features.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
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

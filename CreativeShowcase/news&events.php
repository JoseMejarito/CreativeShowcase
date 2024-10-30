<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | News & Events</title>
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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">NEWS & EVENTS</h1><br>
    </section>

    <section id="news-events" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Latest News and Events</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/event1.jpg" alt="Event 1" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 1</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 1, highlighting its key features and importance.</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/event2.jpg" alt="Event 2" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 2</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 2, focusing on what makes it special.</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="public/event3.jpg" alt="Event 3" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 3</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 3, providing key details for attendees.</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/event4.jpg" alt="Event 4" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 4</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 4, emphasizing its significance.</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/event5.jpg" alt="Event 5" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 5</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 5, detailing the activities involved.</p>
                </div>
                
                <div class="bg-white p-4 rounded-lg hidden md:block">
                    <img src="public/event6.jpg" alt="Event 6" class="w-full h-48 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Event Title 6</h3>
                    <p class="text-sm text-black mt-2">Brief description of event 6, highlighting key speakers or features.</p>
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

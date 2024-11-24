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
                <!-- Event Item 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 1" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 1</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 1, highlighting its key features and importance.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 2" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 2</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 2, focusing on what makes it special.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/news3.jpg" alt="Event 3" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 3</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 3, providing key details for attendees.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 4 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 4" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 4</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 4, emphasizing its significance.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 5 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 5" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 5</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 5, detailing the activities involved.</p>
                    <a href="article.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <!-- Event Item 6 (Hidden on smaller screens) -->
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between hidden md:block">
                    <img src="public/news3.jpg" alt="Event 6" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">News Title 6</h3>
                    <p class="text-md text-black mt-2 flex-grow">Brief description of News 6, highlighting key speakers or features.</p>
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

    <section id="calendar" class="py-10 bg-uphsl-yellow">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-blue text-center mb-8">Calendar of Events</h2>

            <?php
            // Get the current month and year
            $month = date('m');
            $year = date('Y');

            // Get the first day of the month and the number of days in the month
            $firstDayOfMonth = strtotime("$year-$month-01");
            $daysInMonth = date('t', $firstDayOfMonth);
            $firstDayOfWeek = date('w', $firstDayOfMonth);

            // Get the month name
            $monthName = date('F', $firstDayOfMonth);
            ?>

            <!-- Month Header -->
            <div class="text-3xl text-uphsl-maroon text-center mb-4">
                <?php echo "$monthName $year"; ?>
            </div>

            <div class="grid grid-cols-7 gap-4">
                <!-- Days of the Week -->
                <div class="font-bold text-center text-uphsl-maroon">Sun</div>
                <div class="font-bold text-center text-uphsl-maroon">Mon</div>
                <div class="font-bold text-center text-uphsl-maroon">Tue</div>
                <div class="font-bold text-center text-uphsl-maroon">Wed</div>
                <div class="font-bold text-center text-uphsl-maroon">Thu</div>
                <div class="font-bold text-center text-uphsl-maroon">Fri</div>
                <div class="font-bold text-center text-uphsl-maroon">Sat</div>

                <?php
                // Fill in empty cells for days before the first of the month
                for ($i = 0; $i < $firstDayOfWeek; $i++) {
                    echo '<div></div>';
                }

                // Loop through the days of the month
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    // Format the event date
                    $eventDate = date('l, F j, Y', strtotime("$year-$month-$day")); // Full date format
                    $eventTitle = "Event Title"; // Placeholder event title
                    $eventDescription = "Event on $eventDate"; // Placeholder event description
                    
                    echo '<div class="bg-white p-4 rounded-lg shadow-lg">';
                    echo "<div class='text-2xl font-bold text-uphsl-maroon mb-2'>$day</div>"; // Display day number
                    echo "<h3 class='text-lg font-bold text-uphsl-maroon'>$eventTitle</h3>"; // Display event title
                    echo "<p class='text-md text-black'>$eventDescription</p>"; // Display event description
                    echo '<a href="event.php" class="text-uphsl-blue mt-2 inline-block hover:underline">View Details</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

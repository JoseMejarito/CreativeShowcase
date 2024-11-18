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
                <?php
                // Fetch the latest 6 events from the database
                $sql = "SELECT 
                            ne.event_id, 
                            ne.title, 
                            ne.content, 
                            ne.date_posted, 
                            m.file_path AS image 
                        FROM 
                            news_events ne
                        LEFT JOIN 
                            media m 
                        ON 
                            ne.event_id = m.related_id 
                        AND 
                            m.related_table = 'news_events' 
                        AND 
                            m.media_type = 'image'
                        ORDER BY 
                            ne.date_posted DESC 
                        LIMIT 6";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="' . ($row['image'] ? $row['image'] : 'public/default.jpg') . '" alt="' . htmlspecialchars($row['title']) . '" class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon">' . htmlspecialchars($row['title']) . '</h3>
                            <p class="text-md text-black mt-2 flex-grow">' . htmlspecialchars(substr($row['content'], 0, 100)) . '...</p>
                            <a href="article.php?id=' . $row['event_id'] . '" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                        </div>';
                    }
                } else {
                    echo '<h2 class="text-uphsl-yellow text-center mt-8">No events found.</h2>';
                }
                ?>
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
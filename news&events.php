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

    <?php
    // Database Connection
    try {
        $conn = new mysqli("localhost", "root", "", "creative_showcase");
        if ($conn->connect_error) {
            throw new Exception("Database connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "<p class='text-red-600'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        exit;
    }

    // Fetch the latest news
    try {
        $newsQuery = $conn->prepare("
            SELECT 
                n.news_id, 
                n.title, 
                n.content, 
                n.main_media AS image_path 
            FROM news n 
            ORDER BY n.date_posted DESC 
            LIMIT 6
        ");
        $newsQuery->execute();
        $newsResult = $newsQuery->get_result();
    } catch (Exception $e) {
        echo "<p class='text-red-600'>Error fetching news: " . htmlspecialchars($e->getMessage()) . "</p>";
        $newsResult = null;
    }

    // Fetch upcoming events
    try {
        $eventsQuery = $conn->prepare("
            SELECT 
                e.event_id, 
                e.title, 
                e.date_start, 
                e.date_end, 
                e.location, 
                e.main_media AS image_path 
            FROM events e 
            WHERE e.date_end >= CURDATE()
            ORDER BY e.date_start ASC 
            LIMIT 6
        ");
        $eventsQuery->execute();
        $eventsResult = $eventsQuery->get_result();
    } catch (Exception $e) {
        echo "<p class='text-red-600'>Error fetching events: " . htmlspecialchars($e->getMessage()) . "</p>";
        $eventsResult = null;
    }
    ?>

    <section id="news" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Latest News</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if ($newsResult && $newsResult->num_rows > 0): ?>
                    <?php while ($news = $newsResult->fetch_assoc()): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="<?= htmlspecialchars($news['image_path'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($news['title']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($news['title']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($news['content'], 0, 100)); ?>...
                            </p>
                            <a href="article.php?id=<?= htmlspecialchars($news['news_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">Read more</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-yellow text-center">No news available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="events" class="py-10 bg-uphsl-yellow">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-blue text-center mb-8">Upcoming Events</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if ($eventsResult && $eventsResult->num_rows > 0): ?>
                    <?php while ($event = $eventsResult->fetch_assoc()): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="public/<?= htmlspecialchars($event['image_path'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($event['title']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($event['title']); ?></h3>
                            <p class="text-md text-black mt-2">
                                <strong>Date:</strong> <?= htmlspecialchars(date('F j, Y', strtotime($event['date_start']))); ?> - 
                                <?= htmlspecialchars(date('F j, Y', strtotime($event['date_end']))); ?><br>
                                <strong>Location:</strong> <?= htmlspecialchars($event['location']); ?>
                            </p>
                            <a href="event.php?event_id=<?= htmlspecialchars($event['event_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">View Details</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-blue text-center">No upcoming events available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

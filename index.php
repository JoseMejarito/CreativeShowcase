<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Showcase</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-blue"> 
        <h1 class="text-4xl md:text-5xl lg:text-7xl xl:text-8xl text-uphsl-yellow">CREATIVE SHOWCASE</h1><br>
        <p class="text-white text-3xl mb-6">UNIVERSITY OF PERPETUAL HELP SYSTEM LAGUNA</p>

        <?php include 'carousel.php'; ?><br>
        
        <h3 class="text-6xl text-uphsl-yellow">WHO WE ARE</h3><br>
        
        <div class="flex flex-col justify-center items-center px-8 md:px-20 lg:px-40 max-w-screen-md mx-auto">
            <p class="text-xl text-white mb-4">
                <span class="font-bold text-uphsl-yellow">Creative Showcase</span> is a digital platform for students and artists at 
                <span class="font-bold text-uphsl-yellow">UPHSL</span> to share their talents, gain recognition, and collaborate. We believe in the power of art to inspire and connect, providing a space where creativity thrives. Join us in celebrating artistic expression and building a vibrant creative community!
            </p>
        </div>
        <br><br>
    </section>


<!--
    <section id="full-width-image">
        <img src="public/cca-cover.png" alt="CCA Cover Image" class="w-screen h-auto">
    </section>
-->
    <?php
    // Fetch the latest 3 news entries
    try {
        $query = $conn->prepare("
            SELECT 
                n.news_id, 
                n.title, 
                n.content, 
                n.main_media AS image_path 
            FROM news n 
            ORDER BY n.date_posted DESC 
            LIMIT 3
        ");
        $query->execute();
        $result = $query->get_result();
    } catch (Exception $e) {
        // Handle exceptions (e.g., database errors)
        echo "<p class='text-red-600'>Error fetching news: " . htmlspecialchars($e->getMessage()) . "</p>";
        $result = null;
    }
    ?>

    <section id="section2" class="text-center py-10 bg-uphsl-yellow">
        <h1 class="text-7xl text-uphsl-blue font-anton">LATEST NEWS</h1>
        <br>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8 md:px-20 lg:px-40">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($news = $result->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img 
                            src="<?= htmlspecialchars($news['image_path'] ?? 'default-image.jpg'); ?>" 
                            alt="<?= htmlspecialchars($news['title']); ?>" 
                            class="w-full h-60 object-cover mb-4 rounded-md">
                        
                        <h3 class="text-3xl font-bold text-uphsl-maroon">
                            <?= htmlspecialchars($news['title']); ?>
                        </h3>
                        
                        <p class="text-md text-black mt-2 flex-grow">
                            <?= htmlspecialchars(substr($news['content'], 0, 100)); ?>...
                        </p>
                        
                        <a href="article.php?id=<?= htmlspecialchars($news['news_id']); ?>" 
                        class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-black text-lg">No news available at the moment.</p>
            <?php endif; ?>
        </div>

        <div class="mt-8">
            <a href="news&events.php" 
            class="inline-block bg-uphsl-blue text-white py-3 px-6 rounded-full text-lg">View All News</a>
        </div>
    </section>

    <section id="section3" class="text-center py-10 bg-uphsl-blue">
        <h1 class="text-5xl text-uphsl-yellow mb-6">LET US KNOW WHAT YOU THINK!</h1>
        <p class="text-lg text-white mb-4">Send us a message and let us know what is on your mind!</p>
        
        <form action="send_feedback.php" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <label for="name" class="block text-md text-uphsl-maroon font-semibold mb-2">Full Name</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your full name">
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-md text-uphsl-maroon font-semibold mb-2">School Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your school email">
            </div>
            
            <div class="mb-4">
                <label for="message" class="block text-md text-uphsl-maroon font-semibold mb-2">Your Message</label>
                <textarea id="message" name="message" rows="4" required class="w-full p-2 border border-gray-300 rounded" placeholder="Send us a message..."></textarea>
            </div>
            
            <button type="submit" class="bg-uphsl-blue text-white py-2 px-4 rounded-full text-lg hover:bg-uphsl-yellow transition duration-300">Send</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>

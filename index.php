<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Creative Showcase</title>
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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-yellow">CENTER FOR CULTURE AND ARTS</h1><br>
        <?php include 'carousel.php'; ?><br>
        <h3 class="text-6xl text-uphsl-yellow">WHAT IS CCA?</h3><br>
        
        <div class="flex flex-col md:flex-row justify-center items-center px-8 md:px-20 lg:px-40 max-w-screen-md mx-auto">
            <p class="text-sm text-white mb-4 md:mr-4">
            The UPHSL Center for Culture and Arts is the premier office intended for, but not limited to, various cultural and performing arts groups in the university.
            </p>
            <p class="text-sm text-white mb-4 md:mr-4">
            The establishment of the office is the university’s response to the call to preserve and promote artistic and cultural traditions and heritages of the community and the nation, and to continually engage young Filipinos in creative production. 
            </p>
        </div><br><br>
    </section>


    <section id="full-width-image">
        <img src="public/cca-cover.png" alt="CCA Cover Image" class="w-screen h-auto">
    </section>

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
        <h1 class="text-7xl text-black font-anton">LATEST NEWS</h1>
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
        <h1 class="text-5xl text-white mb-6">BE PART OF CCA</h1>
        <p class="text-lg text-white mb-4">For Students! Join us to explore your creativity and become part of our vibrant community!</p>
        
        <form action="submit_form.php" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
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
                <textarea id="message" name="message" rows="4" required class="w-full p-2 border border-gray-300 rounded" placeholder="Tell us why you want to join..."></textarea>
            </div>
            
            <button type="submit" class="bg-uphsl-blue text-white py-2 px-4 rounded-full text-lg hover:bg-uphsl-yellow transition duration-300">Join Us</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>

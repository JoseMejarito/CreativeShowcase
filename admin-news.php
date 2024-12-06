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
    <?php
require 'connection.php';

// Fetch news and events from the database
$query = "SELECT 
                n.news_id, 
                n.title, 
                n.content, 
                n.main_media AS image_path 
            FROM 
                news n
            ORDER BY 
                n.date_posted DESC
            LIMIT 6;
            ";
$result = $conn->query($query);
?>

<div class="container mx-auto p-6 text-center">
    <div class="mb-4">
        <a href="upload-news.php">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New News</button>
        </a>
    </div>
</div>

<section id="news-events" class="py-10 bg-uphsl-blue">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="<?php echo htmlspecialchars($row['image_path'] ?? 'default-image.jpg'); ?>" 
                             alt="<?php echo htmlspecialchars($row['title']); ?>" 
                             class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="text-md text-black mt-2 flex-grow"><?php echo htmlspecialchars(substr($row['content'], 0, 150)); ?>...</p>
                        <div class="flex justify-start mt-4">
                            <a href="admin-article.php?id=<?php echo $row['news_id']; ?>" 
                               class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                            <a href="delete-news.php?id=<?php echo $row['news_id']; ?>" 
                               onclick="return confirm('Are you sure you want to delete this news?');"
                               class="text-uphsl-maroon hover:underline">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-white">No news available at the moment.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav>
                <ul class="flex space-x-4">
                    <?php if ($page > 1): ?>
                        <li><a href="?page=<?php echo $page - 1; ?>" class="text-uphsl-yellow hover:underline">Previous</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li>
                            <a href="?page=<?php echo $i; ?>" 
                               class="text-uphsl-yellow hover:underline <?php echo $i == $page ? 'font-bold' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <li><a href="?page=<?php echo $page + 1; ?>" class="text-uphsl-yellow hover:underline">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php $conn->close(); ?>

</body>
</html>

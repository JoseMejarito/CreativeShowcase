<?php
require 'connection.php';

// Pagination setup
$items_per_page = 9; // Number of collections per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Fetch collections from the database
$query = $conn->prepare("SELECT collection_id, main_media, collection_name, description FROM collections LIMIT ?, ?");
$query->bind_param("ii", $offset, $items_per_page);
$query->execute();
$result = $query->get_result();

// Count total collections for pagination
$total_query = $conn->query("SELECT COUNT(*) AS total FROM collections");
$total_row = $total_query->fetch_assoc();
$total_collections = $total_row['total'];
$total_pages = ceil($total_collections / $items_per_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Collections</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE COLLECTIONS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <a href="upload-collection.php">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Collection</button>
        </a>
    </div>

    <section id="collections" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php while ($collection = $result->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="<?= htmlspecialchars($collection['main_media'] ?: 'public/placeholder-image.jpg') ?>" 
                             alt="<?= htmlspecialchars($collection['collection_name']) ?>" 
                             class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($collection['collection_name']) ?></h3>
                        <p class="text-md text-black mt-2 flex-grow"><?= htmlspecialchars($collection['description']) ?></p>
                        <div class="flex justify-start mt-4">
                            <a href="admin-edit-collection.php?collection_id=<?= $collection['collection_id'] ?>" 
                               class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                            <a href="delete-collection.php?collection_id=<?= $collection['collection_id'] ?>" 
                               class="text-uphsl-maroon hover:underline" 
                               onclick="return confirm('Are you sure you want to delete this collection?');">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" 
                                   class="<?= $i == $page ? 'font-bold text-uphsl-yellow' : 'text-uphsl-yellow hover:underline' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <li><a href="?page=<?= $page + 1 ?>" class="text-uphsl-yellow hover:underline">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</body>
</html>

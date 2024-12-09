<?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Artists</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE ARTISTS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
        <a href="upload-artist.php">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Artist</button>
        </a>
        </div>
    </div>
    <?php
    require 'connection.php';

    $items_per_page = 6; // Number of artists per page
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Current page
    $offset = ($page - 1) * $items_per_page;

    // Fetch total artist count for pagination
    $total_artists_query = $conn->query("SELECT COUNT(*) AS total FROM artists");
    $total_artists = $total_artists_query->fetch_assoc()['total'];
    $total_pages = ceil($total_artists / $items_per_page);

    // Fetch artists for the current page
    $artists_query = $conn->prepare("SELECT * FROM artists LIMIT ?, ?");
    $artists_query->bind_param("ii", $offset, $items_per_page);
    $artists_query->execute();
    $artists = $artists_query->get_result()->fetch_all(MYSQLI_ASSOC);
    ?>
    <section id="exhibition" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($artists as $artist): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="<?= htmlspecialchars($artist['main_media'] ?? 'public/person-placeholder.jpg') ?>" 
                            alt="<?= htmlspecialchars($artist['name']) ?>" 
                            class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($artist['name']) ?></h3>
                        <p class="text-md text-black mt-2 flex-grow">
                            <?= htmlspecialchars(substr($artist['bio'], 0, 150)) ?>...
                        </p>
                        <div class="flex justify-start mt-4">
                            <a href="admin-artist-profile.php?artist_id=<?= $artist['artist_id'] ?>" 
                            class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                            <a href="delete-artist.php?artist_id=<?= $artist['artist_id'] ?>" 
                            onclick="return confirm('Are you sure you want to delete this artist?');" 
                            class="text-uphsl-maroon hover:underline">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <?php if ($page > 1): ?>
                            <li><a href="?page=<?= $page - 1 ?>" class="text-uphsl-yellow hover:underline">Previous</a></li>
                        <?php endif; ?>

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

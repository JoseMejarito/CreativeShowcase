<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Collections</title>
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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">COLLECTIONS</h1><br>
    </section>

    <?php
    $collections = [];
    $limit = 6; // Number of collections per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Fetch collections from the database with pagination
    $query = $conn->prepare("SELECT collection_id, main_media, collection_name, description FROM collections LIMIT ? OFFSET ?");
    $query->bind_param("ii", $limit, $offset);
    $query->execute();
    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $collections[] = $row;
    }

    // Get the total count for pagination
    $count_query = $conn->query("SELECT COUNT(*) AS total FROM collections");
    $total_collections = $count_query->fetch_assoc()['total'];
    $total_pages = ceil($total_collections / $limit);

    $conn->close();
    ?>

    <section id="collections" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Explore Our Collections</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($collections as $collection): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="<?= htmlspecialchars($collection['main_media']) ?>" 
                            alt="<?= htmlspecialchars($collection['collection_name']) ?>" 
                            class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($collection['collection_name']) ?></h3>
                        <p class="text-md text-black mt-2 flex-grow">
                            <?= htmlspecialchars(substr($collection['description'], 0, 100)) ?>...
                        </p>
                        <a href="collection.php?collection_id=<?= htmlspecialchars($collection['collection_id']) ?>" 
                        class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" 
                                class="text-uphsl-yellow <?= $i === $page ? 'font-bold underline' : 'hover:underline' ?>">
                                <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <li>
                                <a href="?page=<?= $page + 1 ?>" class="text-uphsl-yellow hover:underline">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

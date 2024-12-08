<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Article</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <?php

    try {
        // Get the news ID from the URL
        if (!isset($_GET['id'])) {
            throw new Exception("News ID is missing.");
        }
        $news_id = intval($_GET['id']);

        // Fetch the news article from the database
        $stmt = $conn->prepare("SELECT * FROM news WHERE news_id = ?");
        $stmt->bind_param("i", $news_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            throw new Exception("News article not found.");
        }

        // Fetch the data
        $news = $result->fetch_assoc();
    } catch (Exception $e) {
        echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        exit;
    }
    ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Article Content Section Spans Entire Width -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Article Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4"><?= htmlspecialchars($news['title']) ?></h1>

                <!-- Article Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Posted on:</strong> <?= date("F j, Y", strtotime($news['date_posted'])) ?></p>
                    <p><strong>Author:</strong> <?= htmlspecialchars($news['author']) ?></p>
                </div>

                <!-- Media Section (Image or Video) -->
                <div class="mb-6 w-full">
                    <div class="w-full">
                        <!-- Main Media -->
                        <?php if (!empty($news['main_media'])): ?>
                            <img src="<?= htmlspecialchars($news['main_media']) ?>" alt="Main Media" class="w-full h-full object-cover rounded-md mb-4">
                        <?php else: ?>
                            <p class="text-gray-500">No main media available.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="text-xl text-black text-center leading-relaxed space-y-4">
                    <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
                </div><br><br>

                <!-- Sub Media Section -->
                <div class="flex flex-wrap justify-center md:justify-start md:space-x-4">
                    <?php
                    $availableMedia = [];
                    for ($i = 1; $i <= 3; $i++) {
                        if (!empty($news["sub_media$i"])) {
                            $availableMedia[] = $news["sub_media$i"];
                        }
                    }

                    if (empty($availableMedia)): ?>
                        <p class="text-gray-500 text-center w-full">No additional media available.</p>
                    <?php else:
                        foreach ($availableMedia as $index => $subMedia): ?>
                            <div class="mb-6 w-full md:w-<?= count($availableMedia) === 1 ? '1/2' : '1/3' ?> flex justify-center">
                                <div class="w-full max-w-sm">
                                    <img src="<?= htmlspecialchars($subMedia) ?>" alt="Sub Media <?= $index + 1 ?>" class="w-full h-full object-cover rounded-md mb-4">
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

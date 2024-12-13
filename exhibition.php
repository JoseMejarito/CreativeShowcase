<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Exhibition</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">UNIVERSITY RESIDENT GROUPS</h1><br>
    </section>
    
    <?php
        // Enable error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Database connection
        try {
            $conn = new mysqli("localhost", "root", "", "creative_showcase");
            if ($conn->connect_error) {
                throw new Exception("Database connection failed: " . $conn->connect_error);
            }
        } catch (Exception $e) {
            echo "<p class='text-red-600'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit;
        }

        // Fetch Groups with media
        try {
            $groupQuery = $conn->prepare("
                SELECT 
                    g.group_id, 
                    g.group_name AS name, 
                    g.description, 
                    g.main_media AS image 
                FROM groups g 
                ORDER BY g.group_id ASC 
                LIMIT 6
            ");
            $groupQuery->execute();
            $groupResult = $groupQuery->get_result();
        } catch (Exception $e) {
            echo "<p class='text-red-600'>Error fetching groups: " . htmlspecialchars($e->getMessage()) . "</p>";
            $groupResult = null;
        }

        // Fetch Works with media
        try {
            $worksQuery = $conn->prepare("
                SELECT 
                    w.work_id, 
                    w.title, 
                    w.description, 
                    w.main_media AS image 
                FROM works w 
                ORDER BY w.title ASC 
                LIMIT 6
            ");
            $worksQuery->execute();
            $worksResult = $worksQuery->get_result();
        } catch (Exception $e) {
            echo "<p class='text-red-600'>Error fetching works: " . htmlspecialchars($e->getMessage()) . "</p>";
            $worksResult = null;
        }
    ?>

    <section id="groups" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if ($groupResult && $groupResult->num_rows > 0): ?>
                    <?php while ($group = $groupResult->fetch_assoc()): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="public/<?= htmlspecialchars($group['image'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($group['name']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($group['name']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($group['description'], 0, 100)); ?>...
                            </p>
                            <a href="group-profile.php?group_id=<?= htmlspecialchars($group['group_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">Learn more</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-blue text-center">No groups available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="works" class="py-10 bg-uphsl-yellow">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-blue text-center mb-8">Works of CCA</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if ($worksResult && $worksResult->num_rows > 0): ?>
                    <?php while ($work = $worksResult->fetch_assoc()): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="<?= htmlspecialchars($work['image'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($work['title']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($work['title']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($work['description'], 0, 100)); ?>...
                            </p>
                            <a href="artwork.php?id=<?= htmlspecialchars($work['work_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">Learn more</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-yellow text-center">No works available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

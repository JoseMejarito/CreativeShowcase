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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">ARTISTS' EXHIBITION</h1><br>
    </section>
    
    <?php
    // Error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    try {
        $conn = new mysqli("localhost", "root", "", "creative_showcase");
        if ($conn->connect_error) {
            throw new Exception("Database connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Fetch Artists with their media
    try {
        $artistQuery = $conn->prepare("
            SELECT 
                artists.artist_id, 
                artists.name, 
                artists.bio, 
                media.file_path AS profile_image 
            FROM 
                artists 
            LEFT JOIN 
                media ON media.related_id = artists.artist_id AND media.is_artist = 1 
            LIMIT 6
        ");
        $artistQuery->execute();
        $artistResult = $artistQuery->get_result();
    } catch (Exception $e) {
        echo "Error fetching artists: " . $e->getMessage();
        $artistResult = null;
    }

    // Fetch Groups with their media
    try {
        $groupQuery = $conn->prepare("
            SELECT 
                groups.group_id, 
                groups.group_name AS name, 
                groups.description, 
                media.file_path AS image 
            FROM 
                groups 
            LEFT JOIN 
                media ON media.related_id = groups.group_id AND media.is_group = 1 
            LIMIT 6
        ");
        $groupQuery->execute();
        $groupResult = $groupQuery->get_result();
    } catch (Exception $e) {
        echo "Error fetching groups: " . $e->getMessage();
        $groupResult = null;
    }
    ?>

    <section id="artists" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Featured Artists</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if ($artistResult && $artistResult->num_rows > 0): ?>
                    <?php while ($artist = $artistResult->fetch_assoc()): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="public/<?= htmlspecialchars($artist['profile_image'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($artist['name']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($artist['name']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($artist['bio'], 0, 100)); ?>...
                            </p>
                            <a href="artist-profile.php?id=<?= htmlspecialchars($artist['artist_id']); ?>" class="text-uphsl-blue mt-4 inline-block">View Profile</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-yellow text-center">No artists available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="groups" class="py-10 bg-uphsl-yellow">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-blue text-center mb-8">Featured Groups</h2>

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
                            <a href="group-details.php?id=<?= htmlspecialchars($group['group_id']); ?>" class="text-uphsl-blue mt-4 inline-block">Learn more</a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-uphsl-blue text-center">No groups available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

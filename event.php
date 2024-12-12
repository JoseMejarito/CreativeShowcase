<?php 
include 'connection.php';

// Check if event_id is provided in the URL
if (!isset($_GET['event_id']) || !is_numeric($_GET['event_id']) || $_GET['event_id'] <= 0) {
    die("Invalid Event ID.");
}

$event_id = intval($_GET['event_id']);

// Fetch event details
$event_query = $conn->prepare("SELECT e.title, e.description, e.date_start, e.date_end, e.location, e.main_media FROM events e WHERE e.event_id = ?");
$event_query->bind_param("i", $event_id);
$event_query->execute();
$event_result = $event_query->get_result();

if ($event_result->num_rows === 0) {
    die("Event not found.");
}

$event = $event_result->fetch_assoc();

// Fetch associated groups
$group_query = $conn->prepare(
    "SELECT g.group_id, g.group_name 
     FROM groups g 
     INNER JOIN event_groups eg ON g.group_id = eg.group_id 
     WHERE eg.event_id = ?"
);
$group_query->bind_param("i", $event_id);
$group_query->execute();
$groups_result = $group_query->get_result();

// Fetch associated collections
$collection_query = $conn->prepare(
    "SELECT c.collection_id, c.collection_name 
     FROM collections c 
     INNER JOIN event_collections ec ON c.collection_id = ec.collection_id 
     WHERE ec.event_id = ?"
);
$collection_query->bind_param("i", $event_id);
$collection_query->execute();
$collections_result = $collection_query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Event Content Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Event Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">
                    <?= htmlspecialchars($event['title']) ?>
                </h1>

                <div class="mt-6">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Presented By</h3>
                    <?php while ($group = $groups_result->fetch_assoc()): ?>
                        <p class="text-uphsl-blue hover:underline">
                            <?= htmlspecialchars($group['group_name']) ?>
                        </p>
                    <?php endwhile; ?>
                </div>
                <!-- Collection Info -->
                <div class="mt-6">
                    <h3 class="text-xl font-bold text-uphsl-maroon">Collection</h3>
                    <?php while ($collection = $collections_result->fetch_assoc()): ?>
                        <p class="text-uphsl-blue hover:underline">
                            <?= htmlspecialchars($collection['collection_name']) ?>
                        </p>
                    <?php endwhile; ?>
                </div><br>

                <!-- Event Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Date Start:</strong> <?= htmlspecialchars($event['date_start']) ?></p>
                    <p><strong>Date End:</strong> <?= htmlspecialchars($event['date_end']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($event['location']) ?></p>
                </div>

                <!-- Event Description -->
                <div class="text-2xl text-black text-center leading-relaxed space-y-4">
                    <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                </div><br>

                <!-- Main Media -->
                <div class="mb-6 w-full">
                    <div class="w-full">
                        <img src="public/<?= htmlspecialchars($event['main_media']) ?>" alt="Main Media" class="w-49 h-49 object-cover rounded-md mb-4">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php
// Close database connections
$event_query->close();
$group_query->close();
$collection_query->close();
$conn->close();
?>
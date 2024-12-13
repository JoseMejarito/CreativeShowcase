<?php 
    include 'connection.php';

    // Fetch collection ID from the query string
    $collection_id = isset($_GET['collection_id']) ? intval($_GET['collection_id']) : 0;

    // Initialize variables for collection details and related data
    $collection = null;
    $groups = [];
    $events = [];
    $works = [];

    if ($collection_id > 0) {
        // Query to fetch collection details
        $collection_query = "SELECT * FROM collections WHERE collection_id = ?";
        $stmt = $conn->prepare($collection_query);
        $stmt->bind_param("i", $collection_id);
        $stmt->execute();
        $collection_result = $stmt->get_result();
        if ($collection_result->num_rows > 0) {
            $collection = $collection_result->fetch_assoc();

            // Query to fetch groups associated with the collection
            $groups_query = "SELECT g.group_id, g.group_name, g.description, g.main_media FROM groups g 
                             WHERE g.collection_id = ?";
            $stmt = $conn->prepare($groups_query);
            $stmt->bind_param("i", $collection_id);
            $stmt->execute();
            $groups_result = $stmt->get_result();
            while ($row = $groups_result->fetch_assoc()) {
                $groups[] = $row;
            }

            // Query to fetch events associated with the collection
            $events_query = "SELECT e.event_id, e.title, e.date_start, e.date_end, e.location, e.main_media FROM events e 
                             INNER JOIN event_collections ec ON e.event_id = ec.event_id 
                             WHERE ec.collection_id = ?";
            $stmt = $conn->prepare($events_query);
            $stmt->bind_param("i", $collection_id);
            $stmt->execute();
            $events_result = $stmt->get_result();
            while ($row = $events_result->fetch_assoc()) {
                $events[] = $row;
            }

            // Query to fetch works associated with the collection
            $works_query = "SELECT w.work_id, w.title, w.description, w.main_media FROM works w 
                            INNER JOIN works_collections wc ON w.work_id = wc.work_id 
                            WHERE wc.collection_id = ?";
            $stmt = $conn->prepare($works_query);
            $stmt->bind_param("i", $collection_id);
            $stmt->execute();
            $works_result = $stmt->get_result();
            while ($row = $works_result->fetch_assoc()) {
                $works[] = $row;
            }
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Collection</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue text-center">
        <div class="max-w-screen-xl mx-auto px-4">
            <?php if ($collection): ?>
                <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                
                    <!-- Collection Header -->
                    <h1 class="text-6xl font-bold text-uphsl-maroon mb-4">
                        <?php echo htmlspecialchars($collection['collection_name']); ?>
                    </h1>

                    <!-- Collection Description -->
                    <div class="text-xl text-black leading-relaxed space-y-4 mb-6">
                        <p><?php echo nl2br(htmlspecialchars($collection['description'])); ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                    <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Collection Not Found</h1>
                    <p class="text-lg text-black leading-relaxed">The collection you are looking for does not exist or has been removed.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section id="groups" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
        <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Associated Groups</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if (!empty($groups)): ?>
                    <?php foreach ($groups as $group): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="public/<?= htmlspecialchars($group['main_media'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($group['group_name']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($group['group_name']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($group['description'], 0, 100)); ?>...
                            </p>
                            <a href="group-profile.php?group_id=<?= htmlspecialchars($group['group_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">Learn more</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-uphsl-blue text-center">No groups available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="events" class="py-10 bg-uphsl-yellow">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-blue text-center mb-8">Associated Events</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="public/<?= htmlspecialchars($event['main_media'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($event['title']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($event['title']); ?></h3>
                            <p class="text-md text-black mt-2">
                                <strong>Date:</strong> <?= htmlspecialchars(date('F j, Y', strtotime($event['date_start']))); ?> - 
                                <?= htmlspecialchars(date('F j, Y', strtotime($event['date_end']))); ?><br>
                                <strong>Location:</strong> <?= htmlspecialchars($event['location']); ?>
                            </p>
                            <a href="event.php?event_id=<?= htmlspecialchars($event['event_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">View Details</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-uphsl-blue text-center">No upcoming events available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="works" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Associated Works</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php if (!empty($works)): ?>
                    <?php foreach ($works as $work): ?>
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                            <img src="<?= htmlspecialchars($work['main_media'] ?? 'default-image.jpg'); ?>" 
                                alt="<?= htmlspecialchars($work['title']); ?>" 
                                class="w-full h-60 object-cover mb-4 rounded-md">
                            <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($work['title']); ?></h3>
                            <p class="text-md text-black mt-2 flex-grow">
                                <?= htmlspecialchars(substr($work['description'], 0, 100)); ?>...
                            </p>
                            <a href="artwork.php?id=<?= htmlspecialchars($work['work_id']); ?>" 
                            class="text-uphsl-blue mt-4 inline-block">Learn more</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-uphsl-yellow text-center">No works available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
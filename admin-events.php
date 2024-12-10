<?php
include 'connection.php'; 

// Define the number of items per page
$itemsPerPage = 6;

// Get the current page from the URL, default is 1
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the OFFSET for the SQL query
$offset = ($currentPage - 1) * $itemsPerPage;

// Fetch the total number of rows in the events table
$totalEventsQuery = $conn->query("SELECT COUNT(*) AS total FROM events");
$totalEvents = $totalEventsQuery->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalEvents / $itemsPerPage);

// Fetch the events for the current page
$eventsQuery = $conn->prepare("SELECT * FROM events ORDER BY date_start DESC LIMIT ? OFFSET ?");
$eventsQuery->bind_param("ii", $itemsPerPage, $offset);
$eventsQuery->execute();
$events = $eventsQuery->get_result()->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Events</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE EVENTS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
            <a href="upload-event.php">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Event</button>
            </a>
        </div>
    </div>
    <?php
    require 'connection.php';

    // Fetch events from the database
    $query = $conn->prepare("SELECT event_id, title, description, main_media FROM events ORDER BY created_at DESC LIMIT 12");
    $query->execute();
    $result = $query->get_result();

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }

    $query->close();
    $conn->close();
    ?>

    <section id="news-events" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach ($events as $event): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/<?php echo htmlspecialchars($event['main_media']); ?>" 
                            alt="<?php echo htmlspecialchars($event['title']); ?>" 
                            class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">
                            <?php echo htmlspecialchars($event['title']); ?>
                        </h3>
                        <p class="text-md text-black mt-2 flex-grow">
                            <?php echo htmlspecialchars($event['description']); ?>
                        </p>
                        <div class="flex justify-start mt-4">
                            <a href="admin-edit-event.php?event_id=<?php echo $event['event_id']; ?>" 
                            class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                            <a href="delete-event.php?event_id=<?php echo $event['event_id']; ?>" 
                            class="text-uphsl-maroon hover:underline" 
                            onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($events)): ?>
                    <p class="col-span-full text-center text-white text-lg">
                        No events found. Start adding new events to showcase them here!
                    </p>
                <?php endif; ?>
            </div>

            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <!-- Previous Button -->
                        <?php if ($currentPage > 1): ?>
                            <li>
                                <a href="?page=<?= $currentPage - 1 ?>" class="text-uphsl-yellow hover:underline">Previous</a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" class="<?= $i == $currentPage ? 'font-bold text-white' : 'text-uphsl-yellow' ?> hover:underline">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next Button -->
                        <?php if ($currentPage < $totalPages): ?>
                            <li>
                                <a href="?page=<?= $currentPage + 1 ?>" class="text-uphsl-yellow hover:underline">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

</body>
</html>

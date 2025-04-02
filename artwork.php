<?php 
include 'connection.php';

// Check if work_id is provided in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] <= 0) {
    die("Invalid Work ID.");
}

$work_id = intval($_GET['id']);

// Fetch work details
$work_query = $conn->prepare("SELECT w.title, w.description, w.created_at, w.main_media, w.sub_media1, w.sub_media2, w.sub_media3 FROM works w WHERE w.work_id = ?");
$work_query->bind_param("i", $work_id);
$work_query->execute();
$work_result = $work_query->get_result();

if ($work_result->num_rows === 0) {
    die("work not found.");
}

$works = $work_result->fetch_assoc();

// Fetch associated groups
$group_query = $conn->prepare(
    "SELECT g.group_id, g.group_name 
     FROM groups g 
     INNER JOIN work_groups wg ON g.group_id = wg.group_id 
     WHERE wg.work_id = ?"
);
$group_query->bind_param("i", $work_id);
$group_query->execute();
$groups_result = $group_query->get_result();

// Fetch associated collections
$collection_query = $conn->prepare(
    "SELECT c.collection_id, c.collection_name 
     FROM collections c 
     INNER JOIN works_collections wc ON c.collection_id = wc.collection_id 
     WHERE wc.work_id = ?"
);
$collection_query->bind_param("i", $work_id);
$collection_query->execute();
$collections_result = $collection_query->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <!-- Work Content Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg my-8 w-full">
                <!-- Work Header -->
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">
                    <?= htmlspecialchars($works['title']) ?>
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

                <!-- Work Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Created:</strong> <?= htmlspecialchars($works['created_at']) ?></p>
                </div>

                <!-- Main Media -->
                <div class="mb-6 w-full">
                    <div class="w-full">
                        <img src="<?= htmlspecialchars($works['main_media']) ?>" alt="Main Media" class="w-49 h-49 object-cover rounded-md mb-4">
                    </div>
                </div>

                <!-- Work Description -->
                <div class="text-2xl text-black text-center leading-relaxed space-y-4">
                    <p><?= nl2br(htmlspecialchars($works['description'])) ?></p>
                </div><br>

                <!-- Sub Media Section -->
                <div class="flex justify-center gap-4 overflow-x-auto flex-nowrap">
                    <?php
                    $availableMedia = [];
                    for ($i = 1; $i <= 3; $i++) {
                        if (!empty($works["sub_media$i"])) {
                            $availableMedia[] = $works["sub_media$i"];
                        }
                    }

                    if (empty($availableMedia)): ?>
                        <p class="text-gray-500 text-center w-full">No additional media available.</p>
                    <?php else:
                        foreach ($availableMedia as $index => $subMedia): ?>
                            <div class="flex-shrink-0 w-1/3 max-w-sm">
                                <img src="<?= htmlspecialchars($subMedia) ?>" 
                                    alt="Sub Media <?= $index + 1 ?>" 
                                    class="w-full h-auto object-contain rounded-md">
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

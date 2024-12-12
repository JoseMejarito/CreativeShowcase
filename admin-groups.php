<?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Manage Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">MANAGE GROUPS</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="mb-4">
        <a href="upload-group.php">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Group</button>
            </a>
        </div>
    </div>
    <section id="groups" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php

                // Define pagination variables
                $limit = 6; // Number of groups per page
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Fetch total number of groups for pagination
                $total_query = $conn->query("SELECT COUNT(*) AS total FROM groups");
                $total_groups = $total_query->fetch_assoc()['total'];
                $total_pages = ceil($total_groups / $limit);

                // Fetch groups for the current page
                $query = $conn->query("SELECT group_id, group_name, description, main_media FROM groups LIMIT $limit OFFSET $offset");

                // Display groups
                while ($group = $query->fetch_assoc()):
                ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/<?= htmlspecialchars($group['main_media']) ?>" alt="<?= htmlspecialchars($group['group_name']) ?>" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?= htmlspecialchars($group['group_name']) ?></h3>
                        <p class="text-md text-black mt-2 flex-grow"><?= htmlspecialchars($group['description']) ?></p>
                        <div class="flex justify-start mt-4">
                            <a href="admin-group-profile.php?group_id=<?= $group['group_id'] ?>" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                            <a href="delete-group.php?id=<?= $group['group_id'] ?>" class="text-uphsl-maroon inline-block hover:underline" onclick="return confirm('Are you sure you want to delete this group?')">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <?php if ($page > 1): ?>
                            <li><a href="?page=<?= $page - 1 ?>" class="text-uphsl-yellow hover:underline">Previous</a></li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'text-uphsl-maroon font-bold' : 'text-uphsl-yellow hover:underline' ?>">
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

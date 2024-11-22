<!-- admin-dashboard.php -->
 <?php 
    include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100 anton-regular bg-uphsl-blue">
    <?php include 'admin-navbar.php'; ?>
    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">ADMIN DASHBOARD</h1><br>
    </section>
    <div class="container mx-auto p-6 text-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="admin-news.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage News</a>
            <a href="admin-events.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Events</a>
            <a href="admin-artists.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Artists</a>
            <a href="admin-works.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Artists' Works</a>
            <a href="admin-groups.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Groups</a>
            <a href="admin-artist-groups.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Artist Groups</a>
            <a href="admin-collections.php" class="flex items-center justify-center bg-uphsl-yellow text-uphsl-blue py-4 px-6 rounded-lg text-center text-2xl md:text-3xl lg:text-3xl whitespace-nowrap overflow-hidden text-ellipsis">Manage Collections</a>
        </div>
    </div>
</body>
</html>

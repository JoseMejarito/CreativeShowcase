<?php 
    include 'connection.php';
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
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Events</button>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">Sample Event 1</td>
                    <td class="py-2 px-4 border-b">November 21, 2024</td>
                    <td class="py-2 px-4 border-b">
                        <button class="text-green-500">Edit</button>
                        <button class="text-red-500 ml-4">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

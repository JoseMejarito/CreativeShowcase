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
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New Group</button>
        </div>
    </div>
    <section id="groups" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 1" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 1</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 1's work or style. Their collective efforts have significantly enhanced the exhibition's atmosphere.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 2" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 2</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 2's collaboration and unique contributions to the exhibition, showcasing their synergy and creativity.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 3" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 3</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 3's innovative projects and their impact on the exhibition's narrative and audience engagement.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 4" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 4</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 4's unique perspective and their contributions that have enriched the exhibition experience.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 5" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 5</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 5's collaborative projects that blend various artistic styles and cultural influences.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/cca-photo.jpg" alt="Group 6" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Group Name 6</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of group 6's compelling visual storytelling and their contribution to the exhibition's overall theme.</p>
                    <div class="flex justify-start mt-4">
                        <a href="admin-group-profile.php?id=1" class="text-uphsl-blue inline-block hover:underline mr-2">Edit</a>
                        <a href="#" class="text-uphsl-maroon inline-block hover:underline">Delete</a>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-center">
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="text-uphsl-yellow hover:underline">1</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">2</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">3</a></li>
                        <li><a href="#" class="text-uphsl-yellow hover:underline">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</body>
</html>

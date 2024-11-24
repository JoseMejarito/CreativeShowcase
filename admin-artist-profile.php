<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Artist Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col items-center">
                <img src="public/person-placeholder.jpg" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Artist Image">
                
                <form action="update-artist.php?id=1" method="POST" class="w-full">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Artist Name</h3>
                    <input type="text" name="artist_name" value="Artist Name" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter artist name">

                    <h3 class="text-2xl font-bold text-uphsl-maroon">Artist Biography</h3>
                    <textarea name="biography" rows="4" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter artist biography">An artist known for his unique style, blending modern techniques with traditional forms. His works have been displayed worldwide.</textarea>

                    <div class="mt-6 items-center">
                        <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Department</h3>
                        <select name="department" class="w-full p-2 border border-gray-300 rounded mb-4">
                            <option value="College of Computer Studies" selected>College of Computer Studies</option>
                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                            <option value="College of Engineering">College of Engineering</option>
                            <option value="College of Education">College of Education</option>
                            <!-- Add more departments as needed -->
                        </select>
                    </div>

                    <div class="mt-6 flex justify-between">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Changes</button>
                        <button type="button" onclick="window.location.href='admin-artist-profile.php'" class="bg-gray-300 text-black px-4 py-2 rounded">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="mt-10">
                <h2 class="text-3xl text-uphsl-yellow text-center mb-8">Works</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Work Item 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Abstract Landscape" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Abstract Landscape</h3>
                        <p class="text-md text-black mt-2 flex-grow">A beautiful depiction of nature in abstract forms and vivid colors.</p>
                        <div class="flex justify-between mt-4">
                            <a href="admin-artwork.php" class="text-uphsl-blue inline-block">Read more</a>
                            <div class="flex space-x-2">
                                <a href="edit-artwork.php?id=1" class="text-black hover:underline">Edit</a>
                                <a href="delete-artwork.php?id=1" class="text-uphsl-maroon hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>

                    <!-- Work Item 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Modern Portrait" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Modern Portrait</h3>
                        <p class="text-md text-black mt-2 flex-grow">A portrait capturing raw emotion and expressive details.</p>
                        <div class="flex justify-between mt-4">
                            <a href="admin-artwork.php" class="text-uphsl-blue inline-block">Read more</a>
                            <div class="flex space-x-2">
                                <a href="edit-artwork.php?id=2" class="text-black hover:underline">Edit</a>
                                <a href="delete-artwork.php?id=2" class="text-uphsl-maroon hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>

                    <!-- Work Item 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Urban Impressions" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Urban Impressions</h3>
                        <p class="text-md text-black mt-2 flex-grow">An artwork reflecting the dynamic energy of city life.</p>
                        <div class="flex justify-between mt-4">
                            <a href="admin-artwork.php" class="text-uphsl-blue inline-block">Read more</a>
                            <div class="flex space-x-2">
                                <a href="edit-artwork.php?id=3" class="text-black hover:underline">Edit</a>
                                <a href="delete-artwork.php?id=3" class="text-uphsl-maroon hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination Links -->
                <div class="mt-8 flex justify-center">
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Previous</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2 font-bold">1</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">2</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Next</a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>

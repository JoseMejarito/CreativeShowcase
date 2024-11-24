<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Admin Artwork Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

</head>
<body class="anton-regular">
    <?php include 'admin-navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                <!-- Editable Artwork Title -->
                <h2 class="text-2xl md:text-3xl font-bold text-uphsl-maroon mb-4">
                    <input type="text" value="Title of the Artwork" class="border-b border-gray-400 focus:outline-none focus:border-uphsl-maroon w-full" />
                </h2>

                <!-- Editable Artwork Info -->
                <div class="flex flex-col md:flex-row justify-between text-sm text-gray-500 mb-6 space-y-2 md:space-y-0">
                    <p><strong>Artist:</strong> <input type="text" value="Artist's Name" class="border-b border-gray-400 focus:outline-none focus:border-uphsl-maroon w-full" /></p>
                    <p><strong>Category:</strong> <input type="text" value="Artwork Category" class="border-b border-gray-400 focus:outline-none focus:border-uphsl-maroon w-full" /></p>
                    <p><strong>Date Created:</strong> <input type="date" value="2024-11-06" class="border-b border-gray-400 focus:outline-none focus:border-uphsl-maroon w-full" /></p>
                </div>

                <!-- Carousel Container -->
                <div class="relative mb-6">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                        <!-- Editable Carousel Images -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <input type="file" accept="image/*" class="w-full h-auto max-h-96 object-cover rounded-md mb-4" />
                            </div>
                            <div class="carousel-item">
                                <input type="file" accept="image/*" class="w-full h-auto max-h-96 object-cover rounded-md mb-4" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Editable Artwork Description -->
                <div class="text-lg text-black leading-relaxed space-y-4">
                    <textarea class="w-full border border-gray-400 rounded-md p-2 focus:outline-none focus:border-uphsl-maroon" rows="4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et nisi nec risus eleifend accumsan. Proin vel
                        massa nec ligula viverra tincidunt ac eget purus. Ut euismod varius orci, at varius mi dictum nec.
                    </textarea>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
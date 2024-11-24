<?php 
include 'connection.php';
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
                <h1 class="text-4xl font-bold text-uphsl-maroon mb-4">Event Title</h1>

                <!-- Event Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Date Start:</strong> November 6, 2024</p>
                    <p><strong>Date End:</strong> November 8, 2024</p>
                    <p><strong>Location:</strong> Event Location</p>
                </div>

                <!-- Banner Image -->
                <div class="mb-6 w-full">
                    <div class="w-full">
                        <!-- Placeholder for Banner Image -->
                        <img src="public/cca-cover.png" alt="Event Banner" class="w-full h-full object-cover rounded-md mb-4">
                    </div>
                </div>

                <!-- Event Description -->
                <div class="text-lg text-black leading-relaxed space-y-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et nisi nec risus eleifend accumsan. Proin vel
                        massa nec ligula viverra tincidunt ac eget purus. Ut euismod varius orci, at varius mi dictum nec.
                    </p>
                    <p>
                        Cras feugiat scelerisque urna, a volutpat lorem pellentesque eget. Nullam maximus, metus eget dapibus tempus, lorem
                        augue tempor odio, vel efficitur augue est in nunc.
                    </p>
                </div>

                <!-- Collection Info (Optional) -->
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Collection</h3>
                    <p class="text-uphsl-blue hover:underline">Music</p>
                    <p class="text-uphsl-blue hover:underline">Dance</p>
                    <p class="text-uphsl-blue hover:underline">Theater</p>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

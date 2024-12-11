<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Artist Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">Artist Name</h1><br>
    </section>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col items-center">
                <img src="public/person-placeholder.jpg" class="w-64 h-64 object-cover mb-4 rounded-md">
                <h3 class="text-2xl font-bold text-uphsl-maroon">Artist Biography</h3>
                <p class="text-black">An artist known for his unique style, blending modern techniques with traditional forms. His works have been displayed worldwide.</p>

                <div class="mt-6 items-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Department</h3>
                    <p class="text-uphsl-blue">College of Computer Studies</p>
                </div>
                <div class="mt-6 items-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Group/s</h3>
                    <p class="text-uphsl-blue">Dance Troupe</p>
                </div>
            </div>

    <?php include 'footer.php'; ?>
</body>
</html>

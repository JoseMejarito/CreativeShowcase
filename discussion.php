<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular bg-uphsl-blue">
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">University Forum</h1><br>
    </section>

    <section id="forum" class="w-full h-screen max-w-7xl mx-auto px-4">
        <div class="relative w-full h-full border rounded-lg overflow-hidden shadow-lg">
            <iframe 
                src="http://flarum.localhost"
                class="w-full h-full min-h-[600px] md:min-h-[800px] border-0"
            ></iframe>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>
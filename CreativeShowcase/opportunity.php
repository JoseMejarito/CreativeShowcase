<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Opportunities</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">CAREER OPPORTUNITIES</h1><br>
    </section>

    <section id="opportunities" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Join and Explore</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Graphic Designer</h3>
                    <p class="text-md text-black mt-2">Work with a dynamic team to create visual content for digital and print platforms.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Video Editor</h3>
                    <p class="text-md text-black mt-2">Edit high-quality videos for various projects across the department.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Marketing Specialist</h3>
                    <p class="text-md text-black mt-2">Develop and implement marketing strategies to promote events and programs.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Photographer</h3>
                    <p class="text-md text-black mt-2">Capture and edit photographs for exhibitions, performances, and other events.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Content Writer</h3>
                    <p class="text-md text-black mt-2">Create engaging written content for newsletters, websites, and social media.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-uphsl-maroon">Event Coordinator</h3>
                    <p class="text-md text-black mt-2">Plan and execute exhibitions, performances, and workshops.</p>
                    <a href="#" class="text-uphsl-blue hover:underline mt-4 inline-block">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

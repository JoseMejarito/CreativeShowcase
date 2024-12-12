<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | About Us</title>
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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">ABOUT US</h1><br>
    </section>

    <section id="about-content" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Who We Are</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    The UPHSL Center for Culture and Arts is the premier office intended for, but not limited to, 
                    various cultural and performing arts groups in the university.
                </p>
                <p class="mb-4">
                    The establishment of the office is the university’s response to the call to preserve and promote artistic 
                    and cultural traditions and heritages of the community and the nation, and to continually engage young Filipinos in creative production. 
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">CCA MISSION</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    To be the center of brilliance in the institution and the community through developing artist-members and trainees with cultural excellence, 
                    arts servanthood, and aesthetic perceptiveness, and continued production of cultural projects.
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">CCA VISION</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    The University of Perpetual Help System Laguna Center for Culture and Arts envisions to be the core producer of cultural and artistic excellence 
                    in the institution and the community, with its members and trainees 
                    bearing a profound sense of appreciation towards Philippine traditional and contemporary culture and arts.
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">CORE VALUES</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    Cultural Excellence. Perpetualite student-artists aim for excellence, and not settling for mediocre results. 
                    It is about focusing on creating something that has never been created before and achieving unprecedented results. 
                    Artist-members feel that what they are working on is meaningful, significant, and purpose-based. 
                    Everyone concerned is highly inspired by the common purpose: preservation and promotion of culture, 
                    which becomes the driving force behind everything that they do.
                </p>
                <p class="mb-4">
                    Arts Servanthood. Servanthood is one that serves others; performs duties of, and for the arts by the artist of, and for the people. 
                    Perpetualite student-artists care for and meet the needs of others before caring for one’s self, having the compassionate heart and attentiveness to the needs of others. 
                    Compassion for others involves pure motives without expectation of anything in return; displaying kindness and concern for others. 
                    Artist-members are to serve, not to be served.
                </p>
            </div>

            <div class="flex flex-col items-center text-center mb-10">
                <img src="public/director-photo.jpg" alt="Director Photo" class="w-48 h-48 object-cover rounded-full shadow-lg mb-4">
                <p class="text-2xl text-white font-semibold">
                    Headed by the Director for Culture and Arts, Mr. Bryan Neil B. Ladim, LPT MAEd
                </p>
            </div>

            <div class="mt-8 flex justify-center">
                <img src="public/cca-photo.jpg" alt="CCA Photo" class="rounded-lg shadow-lg w-full md:w-3/4 lg:w-2/3 xl:w-3/4">
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

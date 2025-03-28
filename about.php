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
                <p class="text-xl text-white mb-4">
                    <span class="font-bold text-uphsl-yellow">Creative Showcase</span> is a digital platform for students and artists at 
                    <span class="font-bold text-uphsl-yellow">UPHSL</span> to share their talents, gain recognition, and collaborate. We believe in the power of art to inspire and connect, providing a space where creativity thrives. Join us in celebrating artistic expression and building a vibrant creative community!
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">UNIVERSITY HISTORY</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    The University of Perpetual Help System, having committed itself to service in the forefront of education and health care, came into being out of the unselfish effort and untiring commitment of its founder: Dr. Jose G. Tamayo and Dr. Josefina Laperal Tamayo. The desire to serve others was manifested at a very young age when Dr. Jose G. Tamayo, then a young boy dreamt of being a doctor. For him, it was the best way he that he could serve his fellowmen. But when that dream became a reality, he realized that his best was not good enough the services he rendered were so limited and only within the realm of his profession as a doctor. With an ardent desire to serve his fellowmen, the idea of reaching out to through the setting up of an educational institution, gave birth to the following:
                    <br><br>
                    University of Perpetual Help System Laguna (formerly Perpetual Help College of Laguna) opened its door for academic excellence in 1976 with a total of 89 students in the first and second and 367 students in the tertiary level. The campus is located along the old national highway in Biñan which is very accessible.
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">MISSION</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    The University of Perpetual Help System is dedicated to the development of the Filipino as a leader. It aims to graduate dynamic students who are physically, intellectually, socially and spiritually committed to the achievement of the best quality of life.
                    <br><br>
                    As a system of service in health and education, the University of Perpetual Help System is dedicated to the formation of Christian, services and research oriented professionals and leaders in quality education and health care.
                    <br><br>
                    It shall produce Perpetualites who outstandingly value the virtues of reaching out and helping others as vital ingredients to nation building.
                </p>
            </div><br>

            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">VISION</h2>
            <div class="text-white text-lg leading-relaxed">
                <p class="mb-4">
                    The University of Perpetual Help System is a premier University that provides unique and innovative educational processes, contents, end-results for the pursuit of excellence in academics, technology, and research through community partnership and industry linkages.
                    <br><br>
                    The University takes the lead role as a catalyst for human resource development, continues to inculcate values as way of strengthening the moral fiber of the Filipino individuals proud of their race and prepared for exemplary global participation in the realm of arts, sciences, humanities, and business
                    <br><br>
                    It sees the Filipino people enjoying quality and abundant life, living in peace and building a nation that the next generations shall be nourishing, cherishing and valuing.
                </p>
            </div><br>

            <!--<div class="flex flex-col items-center text-center mb-10">
                <img src="public/director-photo.jpg" alt="Director Photo" class="w-48 h-48 object-cover rounded-full shadow-lg mb-4">
                <p class="text-2xl text-white font-semibold">
                    Headed by the Director for Culture and Arts, Mr. Bryan Neil B. Ladim, LPT MAEd
                </p>
            </div>-->

            <div class="mt-8 flex justify-center w-full">
                <img src="public/UPHSL-Photo.jpg" alt="University Photo" class="rounded-lg shadow-lg w-full max-w-none">
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>

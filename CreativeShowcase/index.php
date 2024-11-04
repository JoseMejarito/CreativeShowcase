<?php 
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Creative Showcase</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    
    <?php include 'navbar.php'; ?>

    <section id="section1" class="text-center py-10 pb-0 bg-uphsl-blue"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-yellow">CENTER FOR CULTURE AND ARTS</h1><br>
        <?php include 'carousel.php'; ?><br>
        <h3 class="text-6xl text-uphsl-yellow">WHAT IS CCA?</h3><br>
        
        <div class="flex flex-col md:flex-row justify-center items-center px-8 md:px-20 lg:px-40 max-w-screen-md mx-auto">
            <p class="text-sm text-white mb-4 md:mr-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a lacinia arcu. Vestibulum a massa et ipsum viverra gravida. 
                <br>Nulla porttitor urna non dui sollicitudin suscipit quis non odio. Nam sollicitudin enim justo, quis fermentum urna rutrum ac.
            </p>
            <p class="text-sm text-white mb-4 md:mr-4">
                Nam ante nibh, sagittis quis laoreet et, rutrum ut nibh. Fusce non enim libero. Aenean ullamcorper elit ut dolor fermentum, sit amet gravida justo malesuada. 
            </p>
        </div><br><br>
    </section>


    <section id="full-width-image">
        <img src="public/cca-cover.png" alt="CCA Cover Image" class="w-screen h-auto">
    </section>

    <section id="section2" class="text-center py-10 bg-uphsl-yellow"> 
        <h1 class="text-7xl text-black">NEWS & EVENTS</h1><br>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8 md:px-20 lg:px-40">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="public/news1.jpg" alt="Event 1" class="w-full h-50 object-cover mb-4 rounded-md">
                <h3 class="text-3xl font-bold text-uphsl-maroon">Perps Drag Race 2024</h3>
                <p class="text-md text-black mt-2">Join us as we celebrate 𝒅𝒊𝒗𝒆𝒓𝒔𝒊𝒕𝒚, 𝒄𝒓𝒆𝒂𝒕𝒊𝒗𝒆 𝒆𝒙𝒑𝒓𝒆𝒔𝒔𝒊𝒐𝒏, and 𝒄𝒐𝒎𝒎𝒖𝒏𝒊𝒕𝒚 𝒆𝒎𝒑𝒐𝒘𝒆𝒓𝒎𝒆𝒏𝒕 like never before. 
                    <br>Perpetualites, this is your chance to shine, showcase your talents, and embrace your true selves in a safe and inclusive space. 
                    <br>🌟 Let's uplift each other through creativity and shared performances that reflect the power of acceptance and respect.</p>
                <a href="#" class="text-uphsl-blue mt-4 inline-block">Read more</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="public/news2.jpg" alt="Event 2" class="w-full h-50 object-cover mb-4 rounded-md">
                <h3 class="text-3xl font-bold text-uphsl-maroon">Kaalamang Pangkultura! | AGOS PERPETUAL DANCE COMPANY</h3>
                <p class="text-md text-black mt-2">Halina't makiisa sa 𝘼𝙜𝙤𝙨 𝙋𝙚𝙧𝙥𝙚𝙩𝙪𝙖𝙡 𝘿𝙖𝙣𝙘𝙚 𝘾𝙤𝙢𝙥𝙖𝙣𝙮 sa pagkilala ng ating yaman at pagkakaiba-iba! Tunghayan ang Isang paglalakbay na puno ng saya at paggalang sa ating makulay na sining at kultura!</p>
                <a href="#" class="text-uphsl-blue mt-4 inline-block">Learn more</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="public/news3.jpg" alt="Event 3" class="w-full h-50 object-cover mb-4 rounded-md">
                <h3 class="text-3xl font-bold text-uphsl-maroon">𝐏𝐞𝐫𝐩𝐞𝐭𝐮𝐚𝐥 𝐓𝐡𝐞𝐚𝐭𝐞𝐫 𝐂𝐨𝐥𝐥𝐞𝐜𝐭𝐢𝐯𝐞 | 𝗦𝗘𝗔𝗦𝗢𝗡 𝗢𝗣𝗘𝗡𝗜𝗡𝗚: 𝙈𝙜𝙖 𝙀𝙘𝙝𝙪𝙨𝙚𝙧𝙖𝙣𝙜 𝙋𝙖𝙡𝙖𝙠𝙖</h3>
                <p class="text-md text-black mt-2">The university theater ensemble Perpetual Theater Collective retold the tale of the Greek god Dionysus in his search for a talented poet in a dystopian wasteland, an adaptation of Aristophanes' classic play The Frogs.</p>
                <a href="#" class="text-uphsl-blue mt-4 inline-block">Details</a>
            </div>
        </div>

        <div class="mt-8">
            <a href="news&events.php" class="inline-block bg-uphsl-blue text-white py-3 px-6 rounded-full text-lg">View All Events</a>
        </div>
    </section>

    <section id="section3" class="text-center py-10 bg-uphsl-maroon">
        <h1 class="text-5xl text-uphsl-yellow mb-6">BE PART OF CCA</h1>
        <p class="text-lg text-white mb-4">Join us to explore your creativity and become part of our vibrant community!</p>
        
        <form action="submit_form.php" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <div class="mb-4">
                <label for="name" class="block text-md text-uphsl-maroon font-semibold mb-2">Full Name</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your full name">
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-md text-uphsl-maroon font-semibold mb-2">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded" placeholder="Enter your email address">
            </div>
            
            <div class="mb-4">
                <label for="message" class="block text-md text-uphsl-maroon font-semibold mb-2">Your Message</label>
                <textarea id="message" name="message" rows="4" required class="w-full p-2 border border-gray-300 rounded" placeholder="Tell us why you want to join..."></textarea>
            </div>
            
            <button type="submit" class="bg-uphsl-blue text-white py-2 px-4 rounded-full text-lg hover:bg-uphsl-yellow transition duration-300">Join Us</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>
</html>

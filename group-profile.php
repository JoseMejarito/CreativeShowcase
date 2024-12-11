<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Group Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue">Group Name</h1><br>
    </section>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col items-center">
            <img src="public/cca-photo.jpg" class="w-full h-auto max-w-xs object-cover mb-4 rounded-md">
                <h3 class="text-2xl font-bold text-uphsl-maroon">Group Biography</h3>
                <p class="text-black">A creative collective known for their innovative approach to art, merging various styles and techniques. Their works have been showcased in numerous exhibitions.</p>

                <div class="mt-6 text-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Collection</h3>
                    <p class="text-uphsl-blue">Dance</p>
                </div>
            </div>

            <div class="mt-10">
                <h2 class="text-3xl text-uphsl-yellow text-center mb-8">Works</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                   <!-- Work Item 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 1" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Collaborative Piece 1</h3>
                        <p class="text-md text-black mt-2 flex-grow">A stunning work showcasing the group's unique blend of styles and perspectives.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>

                    <!-- Work Item 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 2" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Collaborative Piece 2</h3>
                        <p class="text-md text-black mt-2 flex-grow">An exploration of themes that resonate deeply within the community.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>

                    <!-- Work Item 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="public/news3.jpg" alt="Work 3" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon">Collaborative Piece 3</h3>
                        <p class="text-md text-black mt-2 flex-grow">A vibrant representation of the group's artistic journey and vision.</p>
                        <a href="artwork.php" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>
                </div>

                <!-- Pagination Links (Static for Now) -->
                <div class="mt-8 flex justify-center">
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Previous</a>
                    <a href="#" class="text-uphsl-yellow hover :underline mx-2 font-bold">1</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">2</a>
                    <a href="#" class="text-uphsl-yellow hover:underline mx-2">Next</a>
                </div>
            </div>
        </div>
    </section>

    <section id="members" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Members</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
               
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 1" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 1</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 1's work or style. Their contribution to the exhibition is notable for its creativity and impact.</p>
                    <a href="artist-profile.php?id=1" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 2" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 2</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 2's work or style. Their unique approach has captivated audiences and added depth to the exhibition.</p>
                    <a href="artist-profile.php?id=2" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 3" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 3</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 3's work or style. Their pieces are known for their emotional resonance and striking visuals.</p>
                    <a href="artist-profile.php?id=3" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 4" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 4</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 4's innovative techniques and contributions to the exhibition, showcasing a unique perspective.</p>
                    <a href="artist-profile.php?id=4" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 5" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 5</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 5's distinctive style, blending cultural elements with contemporary design.</p>
                    <a href="artist-profile.php?id=5" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="public/person-placeholder.jpg" alt="Artist 6" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon">Artist Name 6</h3>
                    <p class="text-md text-black mt-2 flex-grow">Description of artist 6's compelling visual narrative and their impact on the exhibition's overall theme.</p>
                    <a href="artist-profile.php?id=6" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
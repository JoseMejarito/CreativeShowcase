<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Artwork Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <!-- Artwork Title -->
                <h2 class="text-3xl font-bold text-uphsl-maroon mb-4">Title of the Artwork</h2>

                <!-- Artwork Info -->
                <div class="flex justify-between text-sm text-gray-500 mb-6">
                    <p><strong>Artist:</strong> Artist's Name</p>
                    <p><strong>Category:</strong> Artwork Category</p>
                    <p><strong>Date Created:</strong> November 6, 2024</p>
                </div>

                <!-- Carousel Container -->
                <div class="relative mb-6">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                        <!-- Carousel Images -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="public/slide3.png" alt="Artwork Image" class="w-full h-auto max-h-96 object-cover rounded-md mb-4">
                            </div>
                            <div class="carousel-item">
                                <img src="public/slide4.png" alt="Artwork Image" class="w-full h-auto max-h-96 object-cover rounded-md mb-4">
                            </div>
                            <!-- Add more images here if needed -->
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Artwork Description -->
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
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('.carousel-item');
        const totalImages = images.length;

        function nextSlide() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % totalImages;
            images[currentIndex].classList.add('active');
        }

        setInterval(nextSlide, 2000);
    </script>

</body>
</html>

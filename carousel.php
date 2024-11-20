<?php 
    include 'connection.php';
?>

<div class="container mx-auto px-6">
    <div id="simple-carousel" class="relative w-full max-w-screen-xl mx-auto overflow-hidden rounded-lg shadow-lg">
        <div class="carousel-images relative h-[60rem] md:h-[70rem] flex transition-transform duration-700" id="carousel"> <!-- Increased height here -->
            
            <!-- Item 1 -->
            <div class="carousel-item flex-shrink-0 w-full" data-carousel-item>
                <img src="public/slide1.png" class="block w-full h-full object-cover mx-auto" alt="Slide 1">
            </div>
            <!-- Item 2 -->
            <div class="carousel-item flex-shrink-0 w-full" data-carousel-item>
                <img src="public/slide2.png" class="block w-full h-full object-cover mx-auto" alt="Slide 2">
            </div>
            <!-- Item 3 -->
            <div class="carousel-item flex-shrink-0 w-full" data-carousel-item>
                <img src="public/slide3.png" class="block w-full h-full object-cover mx-auto" alt="Slide 3">
            </div>
            <!-- Item 4 -->
            <div class="carousel-item flex-shrink-0 w-full" data-carousel-item>
                <img src="public/slide4.png" class="block w-full h-full object-cover mx-auto" alt="Slide 4">
            </div>
        </div>

        <!-- Slider controls -->
        <button type="button" class="absolute top-1/2 left-4 transform -translate-y-1/2 p-2 bg-white/50 hover:bg-white/75 rounded-full shadow-md" data-carousel-prev>
            <svg class="hidden w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button" class="absolute top-1/2 right-4 transform -translate-y-1/2 p-2 bg-white/50 hover:bg-white/75 rounded-full shadow-md" data-carousel-next>
            <svg class="hidden w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    const carouselItems = document.querySelectorAll('[data-carousel-item]');
    const carouselContainer = document.getElementById('carousel');
    let activeIndex = 0;
    const totalItems = carouselItems.length;

    function showItem(index) {
        const offset = -index * 100; // Calculate the offset based on the index
        carouselContainer.style.transform = `translateX(${offset}%)`; // Slide effect
    }

    function nextItem() {
        activeIndex = (activeIndex + 1) % totalItems;
        showItem(activeIndex);
    }

    function prevItem() {
        activeIndex = (activeIndex - 1 + totalItems) % totalItems;
        showItem(activeIndex);
    }

    document.querySelector('[data-carousel-next]').addEventListener('click', nextItem);
    document.querySelector('[data-carousel-prev]').addEventListener('click', prevItem);

    setInterval(nextItem, 2000); 
</script>

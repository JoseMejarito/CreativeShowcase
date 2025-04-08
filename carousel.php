<?php 
    include 'connection.php';
?>

<div class="w-full max-w-screen-5xl mx-auto px-20 h-[50%]"> <!-- Added fixed padding and a max-width -->
    <div class="relative w-full overflow-hidden rounded-none shadow-lg">
        <video 
            src="public/CCA.mp4" 
            class="w-full h-[40rem] md:h-[60rem] object-cover" 
            autoplay 
            loop 
            muted 
            playsinline
        ></video>
    </div>
</div>

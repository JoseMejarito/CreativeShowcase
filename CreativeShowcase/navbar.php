<?php 
    include 'connection.php'; 
?>

<body>
    <nav class="p-4 bg-uphsl-blue">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-5">
                <a href="index.php">
                    <img src="public/cca-logo.png" alt="CCA Logo" class="h-10 w-10 object-contain">
                </a>
                <div class="text-left">
                    <a href="index.php" class="text-white text-lg font-bold anton-regular">CCA | CREATIVE SHOWCASE</a><br>
                    <a href="index.php" class="text-uphsl-yellow text-sm anton-regular">By UPHSL - JONELTA</a>
                </div>
                <a href="index.php">
                    <img src="public/uphsl-logo.png" alt="UPHSL Logo" class="h-12 w-12 object-contain">
                </a>
            </div>

            <button id="menuToggle" class="text-white anton-regular md:hidden" onclick="toggleMenu()">Menu</button>

            <!-- Desktop Menu, hidden on mobile -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="exhibition.php" class="text-white anton-regular text-sm md:text-base lg:text-lg">Exhibition</a>
                <a href="news&events.php" class="text-white anton-regular text-sm md:text-base lg:text-lg hover:text-uphsl-yellow whitespace-nowrap">News & Events</a>
                <a href="collection.php" class="text-white anton-regular text-sm md:text-base lg:text-lg hover:text-uphsl-yellow">Collection</a>
                <a href="opportunity.php" class="text-white anton-regular text-sm md:text-base lg:text-lg hover:text-uphsl-yellow">Opportunity</a>
                <a href="about.php" class="text-white anton-regular text-sm md:text-base lg:text-lg hover:text-uphsl-yellow whitespace-nowrap">About Us</a>
            </div>
        </div>

        <!-- Mobile Menu, hidden on desktop -->
        <div id="mobileMenu" class="hidden flex flex-col space-y-2 mt-2 md:hidden">
            <a href="exhibition.php" class="text-white anton-regular hover:text-uphsl-yellow">Exhibition</a>
            <a href="news&events.php" class="text-white anton-regular hover:text-uphsl-yellow">News & Events</a>
            <a href="collection.php" class="text-white anton-regular hover:text-uphsl-yellow">Collection</a>
            <a href="opportunity.php" class="text-white anton-regular hover:text-uphsl-yellow">Opportunity</a>
            <a href="about.php" class="text-white anton-regular hover:text-uphsl-yellow">About Us</a>
        </div>
    </nav>

    <script>
        function toggleMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
    </script>
</body>

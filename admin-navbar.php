<?php 
    include 'connection.php'; 
    session_start();
    $username = $_SESSION['username'] ?? 'Admin';
?>

<body>
    <nav class="p-4 bg-uphsl-blue">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Left side: Logo & Text -->
            <div class="flex items-center space-x-5">
                <a href="admin-dashboard.php">
                    <img src="public/uphsl-logo.png" alt="UPHSL Logo" class="h-12 w-12 object-contain">
                </a>
                <div class="text-left">
                    <a href="admin-dashboard.php" class="text-white text-lg font-bold anton-regular">
                        CREATIVE SHOWCASE | ADMIN PANEL
                    </a><br>
                    <a href="admin-dashboard.php" class="text-uphsl-yellow text-sm anton-regular">
                        By UPHSL - JONELTA
                    </a>
                </div>
            </div>

            <!-- Right side: Dropdown -->
            <div class="relative inline-block text-left">
                <button onclick="toggleDropdown()" class="text-white bg-black px-4 py-2 rounded hover:bg-yellow-500 transition">
                    <?= htmlspecialchars($username) ?> ⌄
                </button>
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow z-10">
                    <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        // Optional: Close dropdown if clicked outside
        document.addEventListener('click', function(e) {
            const button = document.querySelector('button[onclick="toggleDropdown()"]');
            const menu = document.getElementById('dropdownMenu');
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

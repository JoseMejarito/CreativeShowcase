<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .anton-regular {
      font-family: 'Anton', sans-serif;
    }
  </style>
</head>
<body class="bg-uphsl-blue from-blue-900 to-blue-600 min-h-screen flex items-center justify-center">
    <nav class="p-4 bg-uphsl-blue">
        <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-5">
            <a href="admin-dashboard.php">
                <img src="public/uphsl-logo.png" alt="UPHSL Logo" class="h-12 w-12 object-contain">
            </a>
            
            <div class="text-left">
                <a href="admin-dashboard.php" class="text-white text-lg font-bold anton-regular">CREATIVE SHOWCASE | ADMIN PANEL</a><br>
                <a href="admin-dashboard.php" class="text-uphsl-yellow text-sm anton-regular">By UPHSL - JONELTA</a>
            </div>
        </div>
    </nav>

  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
    <h2 class="text-3xl anton-regular text-center text-gray-800 mb-6">Admin Login</h2>

    <form action="admin-login.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
        <input
          type="text"
          name="username"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input
          type="password"
          name="password"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300"
      >
        Login
      </button>
    </form>
  </div>

</body>
</html>

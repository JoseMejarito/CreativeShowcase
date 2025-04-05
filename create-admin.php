<?php
// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Connect to your database
        include 'connection.php';

        // Check if username exists
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "⚠️ Username already exists.";
        } else {
            // Insert new admin
            $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);
            if ($stmt->execute()) {
                $message = "✅ Admin account created successfully.";
            } else {
                $message = "❌ Error: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();
    } else {
        $message = "⚠️ Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-uphsl-blue min-h-screen flex items-center justify-center anton-regular">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md border">
    <h2 class="text-2xl font-bold mb-6 text-center font-[anton]">Create Admin Account</h2>

    <?php if ($message): ?>
      <div class="mb-4 text-center text-sm text-red-600">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4">
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" id="username" required
               class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative">
            <input type="password" name="password" id="password" required
                class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10">
            <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-0 px-3 text-sm text-gray-500 hover:text-gray-700 focus:outline-none">
            Show
            </button>
        </div>
      </div>
      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-semibold transition">
        Create Admin
      </button>
    </form>
  </div>
  <script>
  const passwordInput = document.getElementById('password');
  const toggleBtn = document.getElementById('togglePassword');

  toggleBtn.addEventListener('click', () => {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    toggleBtn.textContent = isPassword ? 'Hide' : 'Show';
  });
</script>
</body>
</html>

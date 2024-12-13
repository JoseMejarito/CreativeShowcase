<?php 
include 'connection.php';

// Get the artist ID from the URL (e.g., artist_profile.php?id=5)
$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch artist data from the database
$query = "SELECT a.artist_id, a.name, a.bio, d.department_name, 
                 GROUP_CONCAT(g.group_name SEPARATOR ', ') AS group_names, 
                 a.main_media 
          FROM artists a 
          LEFT JOIN departments d ON a.department_id = d.department_id 
          LEFT JOIN group_artists ga ON a.artist_id = ga.artist_id 
          LEFT JOIN groups g ON ga.group_id = g.group_id 
          WHERE a.artist_id = ?
          GROUP BY a.artist_id";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $artist_id);
$stmt->execute();
$result = $stmt->get_result();
$artist = $result->fetch_assoc();

if (!$artist) {
    // Handle case where artist is not found
    echo "<h1>Artist not found</h1>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA | Artist Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">      
    <link rel="stylesheet" href="style.css">
</head>
<body class="anton-regular">
    <?php include 'navbar.php'; ?>

    <section class="text-center py-10 pb-0 bg-uphsl-yellow"> 
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue"><?php echo htmlspecialchars($artist['name']); ?></h1><br>
    </section>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col items-center">
                <img src="<?php echo htmlspecialchars($artist['main_media']); ?>" class="w-64 h-64 object-cover mb-4 rounded-md" alt="Artist Image">
                <h3 class="text-2xl font-bold text-uphsl-maroon">Artist Biography</h3>
                <p class="text-black"><?php echo htmlspecialchars($artist['bio']); ?></p>

                <div class="mt-6 items-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Department</h3>
                    <p class="text-uphsl-blue"><?php echo htmlspecialchars($artist['department_name']); ?></p>
                </div>
                <div class="mt-6 items-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Group/s</h3>
                    <p class="text-uphsl-blue"><?php echo htmlspecialchars($artist['group_names']); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
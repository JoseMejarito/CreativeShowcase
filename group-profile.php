<?php 
include 'connection.php';

// Fetch group information
if (!isset($_GET['group_id'])) {
    die("Group ID is required.");
}

$group_id = intval($_GET['group_id']); // Assuming we are fetching data for the Agos Perpetual Dance Company
$group_query = "SELECT * FROM groups WHERE group_id = ?";
$stmt = $conn->prepare($group_query);
$stmt->bind_param("i", $group_id);
$stmt->execute();
$group_result = $stmt->get_result();
$group = $group_result->fetch_assoc();

// Fetch works related to the group
$works_query = "SELECT * FROM works w 
                JOIN work_groups wg ON w.work_id = wg.work_id 
                WHERE wg.group_id = ?";
$stmt = $conn->prepare($works_query);
$stmt->bind_param("i", $group_id);
$stmt->execute();
$works_result = $stmt->get_result();

// Fetch artists related to the group
$artists_query = "SELECT a.* FROM artists a 
                  JOIN group_artists ga ON a.artist_id = ga.artist_id 
                  WHERE ga.group_id = ?";
$stmt = $conn->prepare($artists_query);
$stmt->bind_param("i", $group_id);
$stmt->execute();
$artists_result = $stmt->get_result();

// Pagination for Works
$works_per_page = 3; // Number of works per page
$current_page_works = isset($_GET['page_works']) ? intval($_GET['page_works']) : 1;
$offset_works = ($current_page_works - 1) * $works_per_page;

// Fetch total works count
$total_works_query = "SELECT COUNT(*) as total FROM works w 
                      JOIN work_groups wg ON w.work_id = wg.work_id 
                      WHERE wg.group_id = ?";
$stmt = $conn->prepare($total_works_query);
$stmt->bind_param("i", $group_id);
$stmt->execute();
$total_works_result = $stmt->get_result();
$total_works = $total_works_result->fetch_assoc()['total'];
$total_pages_works = ceil($total_works / $works_per_page);

// Fetch works related to the group with pagination
$works_query = "SELECT * FROM works w 
                JOIN work_groups wg ON w.work_id = wg.work_id 
                WHERE wg.group_id = ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($works_query);
$stmt->bind_param("iii", $group_id, $works_per_page, $offset_works);
$stmt->execute();
$works_result = $stmt->get_result();

// Pagination for Artists
$artists_per_page = 6; // Number of artists per page
$current_page_artists = isset($_GET['page_artists']) ? intval($_GET['page_artists']) : 1;
$offset_artists = ($current_page_artists - 1) * $artists_per_page;

// Fetch total artists count
$total_artists_query = "SELECT COUNT(*) as total FROM artists a 
                        JOIN group_artists ga ON a.artist_id = ga.artist_id 
                        WHERE ga.group_id = ?";
$stmt = $conn->prepare($total_artists_query);
$stmt->bind_param("i", $group_id);
$stmt->execute();
$total_artists_result = $stmt->get_result();
$total_artists = $total_artists_result->fetch_assoc()['total'];
$total_pages_artists = ceil($total_artists / $artists_per_page);

// Fetch artists related to the group with pagination
$artists_query = "SELECT a.* FROM artists a 
                  JOIN group_artists ga ON a.artist_id = ga.artist_id 
                  WHERE ga.group_id = ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($artists_query);
$stmt->bind_param("iii", $group_id, $artists_per_page, $offset_artists);
$stmt->execute();
$artists_result = $stmt->get_result();
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
        <h1 class="text-5xl md:text-6xl lg:text-8xl xl:text-9xl text-uphsl-blue"><?php echo $group['group_name']; ?></h1><br>
    </section>

    <section class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="bg-white p-5 rounded-lg shadow-lg flex flex-col items-center">
                <img src="public/<?php echo $group['main_media']; ?>" class="w-full h-auto max-w-xs object-cover mb-4 rounded-md">
                <h3 class="text-xl font-bold text-uphsl-maroon">Group Biography</h3>
                <p class="text-black"><?php echo $group['description']; ?></p>

                <div class="mt-6 text-center">
                    <h3 class="text-2xl font-bold text-uphsl-maroon text-center">Collection</h3>
                    <p class="text-uphsl-blue">Dance</p>
                </div>
            </div>

            <div class="mt-10">
                <h2 class="text-3xl text-uphsl-yellow text-center mb-8">Works</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ($work = $works_result->fetch_assoc()): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                        <img src="<?php echo $work['main_media']; ?>" alt="<?php echo $work['title']; ?>" class="w-full h-60 object-cover mb-4 rounded-md">
                        <h3 class="text-3xl font-bold text-uphsl-maroon"><?php echo $work['title']; ?></h3>
                        <p class="text-md text-black mt-2 flex-grow"><?= htmlspecialchars(substr($work['description'], 0, 150)); ?>...</p>
                        <a href="artwork.php?id=<?php echo $work['work_id']; ?>" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                    </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination Links for Works -->
                <div class="mt-8 flex justify-center">
                    <?php if ($current_page_works > 1): ?>
                        <a href="?group_id=<?php echo $group_id; ?>&page_works=<?php echo $current_page_works - 1; ?>" class="text-uphsl-yellow hover:underline mx-2">Previous</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages_works; $i++): ?>
                        <a href="?group_id=<?php echo $group_id; ?>&page_works=<?php echo $i; ?>" class="text-uphsl-yellow hover:underline mx-2 <?php echo ($i == $current_page_works) ? 'font-bold' : ''; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($current_page_works < $total_pages_works): ?>
                        <a href="?group_id=<?php echo $group_id; ?>&page_works=<?php echo $current_page_works + 1; ?>" class="text-uphsl-yellow hover:underline mx-2">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="members" class="py-10 bg-uphsl-blue">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-5xl text-uphsl-yellow text-center mb-8">Members</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php while ($artist = $artists_result->fetch_assoc()): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-between">
                    <img src="<?php echo $artist['main_media']; ?>" alt="<?php echo $artist['name']; ?>" class="w-full h-60 object-cover mb-4 rounded-md">
                    <h3 class="text-3xl font-bold text-uphsl-maroon"><?php echo $artist['name']; ?></h3>
                    <p class="text-md text-black mt-2 flex-grow"><?php echo $artist['bio']; ?></p>
                    <a href="artist-profile.php?id=<?php echo $artist['artist_id']; ?>" class="text-uphsl-blue mt-4 inline-block">Read more</a>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination Links for Members -->
            <div class="mt-8 flex justify-center">
                <?php if ($current_page_artists > 1): ?>
                    <a href="?group_id=<?php echo $group_id; ?>&page_artists=<?php echo $current_page_artists - 1; ?>" class="text-uphsl-yellow hover:underline mx-2">Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages_artists; $i++): ?>
                    <a href="?group_id=<?php echo $group_id; ?>&page_artists=<?php echo $i; ?>" class="text-uphsl-yellow hover:underline mx-2 <?php echo ($i == $current_page_artists) ? 'font-bold' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($current_page_artists < $total_pages_artists): ?>
                    <a href="?group_id=<?php echo $group_id; ?>&page_artists=<?php echo $current_page_artists + 1; ?>" class="text-uphsl-yellow hover:underline mx-2">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
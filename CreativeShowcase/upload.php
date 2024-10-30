<?php
// Database connection
include 'connection.php';

// Fetching categories for works and news
$category_query = "SELECT category_id, category_name FROM categories";
$category_result = $conn->query($category_query);

$news_category_query = "SELECT category_id, category_name FROM news_categories";
$news_category_result = $conn->query($news_category_query);

// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_artist'])) {
        // Handle artist upload
        $artist_name = $_POST['artist_name'];
        $artist_bio = $_POST['artist_bio'];
        $social_link = $_POST['social_link'];

        // Image upload
        $artist_image = $_FILES['artist_image']['name'];
        $target_dir = "public/artists/";
        $target_file = $target_dir . uniqid() . '-' . basename($artist_image);

        if (move_uploaded_file($_FILES['artist_image']['tmp_name'], $target_file)) {
            $insert_artist = $conn->prepare("INSERT INTO artists (artist_name, artist_bio, social_link, artist_image) VALUES (?, ?, ?, ?)");
            $insert_artist->bind_param("ssss", $artist_name, $artist_bio, $social_link, $target_file);
            $insert_artist->execute();
            echo "Artist uploaded successfully!";
        } else {
            echo "Error uploading artist image.";
        }
    }

    if (isset($_POST['add_work'])) {
        // Handle work upload
        $work_title = $_POST['work_title'];
        $work_description = $_POST['work_description'];
        $artist_id = $_POST['artist_id'];
        $category_id = $_POST['category_id'];

        // Image uploads
        foreach ($_FILES['work_images']['name'] as $key => $image) {
            $target_file = "public/works/images/" . uniqid() . '-' . basename($image);
            move_uploaded_file($_FILES['work_images']['tmp_name'][$key], $target_file);
            // Store each image in the database if required
        }

        // Video uploads
        foreach ($_FILES['work_videos']['name'] as $key => $video) {
            $target_file = "public/works/videos/" . uniqid() . '-' . basename($video);
            move_uploaded_file($_FILES['work_videos']['tmp_name'][$key], $target_file);
            // Store each video in the database if required
        }

        $insert_work = $conn->prepare("INSERT INTO works (work_title, work_description, artist_id, category_id) VALUES (?, ?, ?, ?)");
        $insert_work->bind_param("ssii", $work_title, $work_description, $artist_id, $category_id);
        $insert_work->execute();
        echo "Work uploaded successfully!";
    }

    if (isset($_POST['add_news_event'])) {
        // Handle news/event upload
        $news_title = $_POST['news_title'];
        $news_content = $_POST['news_content'];
        $news_category_id = $_POST['news_category_id'];

        // Image uploads
        foreach ($_FILES['news_images']['name'] as $key => $image) {
            $target_file = "public/news_events/images/" . uniqid() . '-' . basename($image);
            move_uploaded_file($_FILES['news_images']['tmp_name'][$key], $target_file);
            // Store each image in the database if required
        }

        // Video uploads
        foreach ($_FILES['news_videos']['name'] as $key => $video) {
            $target_file = "public/news_events/videos/" . uniqid() . '-' . basename($video);
            move_uploaded_file($_FILES['news_videos']['tmp_name'][$key], $target_file);
            // Store each video in the database if required
        }

        $insert_news_event = $conn->prepare("INSERT INTO news_events (title, content, category_id) VALUES (?, ?, ?)");
        $insert_news_event->bind_param("ssi", $news_title, $news_content, $news_category_id);
        $insert_news_event->execute();
        echo "News/Event uploaded successfully!";
    }
}
?>

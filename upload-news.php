<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    // Handle image upload
    $target_dir = "public/";
    $target_file = $target_dir . uniqid() . "-" . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);

    $query = $conn->prepare("INSERT INTO news (title, content) VALUES (?, ?)");
    $query->bind_param("ss", $title, $content);

    if ($query->execute()) {
        $news_id = $conn->insert_id;
        $media_query = $conn->prepare("INSERT INTO media (related_id, file_path, is_news) VALUES (?, ?, 1)");
        $media_query->bind_param("is", $news_id, $target_file);
        $media_query->execute();
        header("Location: admin-dashboard.php?message=News uploaded successfully");
    } else {
        echo "Error: Unable to upload news.";
    }

    $query->close();
    $media_query->close();
}

$conn->close();
?>

<?php
include 'config.php';

$title = $conn->real_escape_string($_POST['title']);
$description = $conn->real_escape_string($_POST['description']);
$author_id = intval($_POST['author_id']);
$genre_id = intval($_POST['genre_id']);

if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
  $targetDir = "uploads/";
  if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
  }
  $fileName = basename($_FILES['cover_image']['name']);
  $targetFile = $targetDir . time() . "_" . $fileName;
  move_uploaded_file($_FILES['cover_image']['tmp_name'], $targetFile);
  $coverImage = $targetFile;
} else {
  $coverImage = 'default-book.png';
}

$sql = "INSERT INTO books (title, description, author_id, genre_id, cover_image)
        VALUES ('$title', '$description', $author_id, $genre_id, '$coverImage')";

if ($conn->query($sql) === TRUE) {
  header("Location: books.php");
  exit;
} else {
  echo "Error: " . $conn->error;
}
?>

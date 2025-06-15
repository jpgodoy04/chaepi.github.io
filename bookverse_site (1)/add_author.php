<?php
include 'config.php';
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit();
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $bio = $_POST['bio'];

  $image = $_FILES['image']['name'];
  $target = "uploads/" . basename($image);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $image_path = $target;
  } else {
    $image_path = "";
  }

  $conn->query("INSERT INTO authors (name, bio, image) VALUES ('$name', '$bio', '$image_path')");

  header("Location: authors.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Author</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4">➕ Add New Author</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Author Name" required class="form-control mb-3">
    <textarea name="bio" placeholder="Author Bio" class="form-control mb-3"></textarea>
    <input type="file" name="image" class="form-control mb-3">
    <button type="submit" name="submit" class="btn btn-primary">Add Author</button>
  </form>
  <a href="authors.php" class="btn btn-secondary mt-3">Back to Authors</a>
</div>
</body>
</html>

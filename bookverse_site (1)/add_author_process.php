<?php
include 'config.php';

$name = $_POST['name'];
$bio  = $_POST['bio'];

$image = '';
if (!empty($_FILES['image']['name'])) {
  $target_dir = "uploads/authors/";
  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $image = $target_file;
}

$conn->query("INSERT INTO authors (name, bio, image) VALUES ('$name', '$bio', '$image')");
header("Location: authors.php");
?>

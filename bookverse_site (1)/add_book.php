<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4">➕ Add New Book</h2>
  <form action="add_book_process.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Author</label>
      <select name="author_id" class="form-select" required>
        <option value="">Select Author</option>
        <?php
        $authors = $conn->query("SELECT id, name FROM authors");
        while ($a = $authors->fetch_assoc()) {
          echo "<option value='{$a['id']}'>" . htmlspecialchars($a['name']) . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Genre</label>
      <select name="genre_id" class="form-select" required>
        <option value="">Select Genre</option>
        <?php
        $genres = $conn->query("SELECT id, name FROM genres");
        while ($g = $genres->fetch_assoc()) {
          echo "<option value='{$g['id']}'>" . htmlspecialchars($g['name']) . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Cover Image</label>
      <input type="file" name="cover_image" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Add Book</button>
    <a href="index.php" class="btn btn-secondary">Back to Home</a>
  </form>
</div>

</body>
</html>

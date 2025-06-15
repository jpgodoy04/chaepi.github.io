<?php include 'config.php';
$query = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Search Books</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light">
<div class="container py-5">
  <h2>Search Books</h2>
  <form method="GET" class="mb-4">
    <input type="text" name="q" value="<?= htmlspecialchars($query) ?>" class="form-control mb-3" placeholder="Search for book titles...">
    <button class="btn btn-primary">Search</button>
  </form>

  <?php
  if ($query) {
    $result = $conn->query("SELECT * FROM books WHERE title LIKE '%$query%'");
    if ($result->num_rows > 0) {
      echo "<ul class='list-group'>";
      while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'><a href='book.php?id={$row['id']}'>{$row['title']}</a></li>";
      }
      echo "</ul>";
    } else {
      echo "<p>No results found.</p>";
    }
  }
  ?>
</div>
</body></html>

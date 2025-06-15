<?php include 'config.php'; session_start();
if (!isset($_SESSION['admin'])) header("Location: admin_login.php");

if ($_POST) {
  $book_id = intval($_POST['book_id']);
  $review = $conn->real_escape_string($_POST['content']);
  $conn->query("INSERT INTO reviews (book_id, content) VALUES ($book_id, '$review')");
  header("Location: reviews.php");
}
$books = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Add Review</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light">
<div class="container py-5">
  <h2>Add Review</h2>
  <form method="POST">
    <select name="book_id" class="form-control mb-3" required>
      <option disabled selected>Select Book</option>
      <?php while ($b = $books->fetch_assoc()) echo "<option value='{$b['id']}'>{$b['title']}</option>"; ?>
    </select>
    <textarea name="content" class="form-control mb-3" placeholder="Review"></textarea>
    <button class="btn btn-success">Add Review</button>
  </form>
</div>
</body></html>

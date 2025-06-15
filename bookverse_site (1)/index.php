<?php include 'config.php'; if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BookVerse Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-color: #f5f6fa;
      --text-color: #2d3436;
      --primary-color: #6c5ce7;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      transition: background-color 0.3s, color 0.3s;
    }
    .hero {
      padding: 4rem 1rem;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 600;
    }
    .btn-custom {
      background-color: var(--primary-color);
      color: #fff;
    }
    .btn-custom:hover {
      background-color: #5a4cd3;
    }
    .card {
      border-radius: 1rem;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    .dark-mode {
      --bg-color: #2d3436;
      --text-color: #f5f6fa;
      --primary-color: #fd79a8;
    }
  </style>
</head>
<body>
<div class="container text-center py-4">
  <button class="btn btn-sm btn-outline-dark float-end" onclick="toggleDarkMode()">Dark Mode</button>
</div>

<div class="hero">
  <h1>📚 Welcome to BookVerse</h1>
  <p class="lead mt-3">Manage your books, authors, reviews, and genres all in one place.</p>
</div>

<div class="container">
  <div class="row g-4">
    <!-- Core Pages -->
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>📖 View Books</h5>
        <a href="books.php" class="btn btn-custom mt-2">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>✍️ View Authors</h5>
        <a href="authors.php" class="btn btn-custom mt-2">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>📑 View Reviews</h5>
        <a href="reviews.php" class="btn btn-custom mt-2">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>🗂️ View Genres</h5>
        <a href="genres.php" class="btn btn-custom mt-2">Go</a>
      </div>
    </div>

    <!-- Add Features -->
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>➕ Add Book</h5>
        <a href="add_book.php" class="btn btn-success mt-2">Add</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>➕ Add Author</h5>
        <a href="add_author.php" class="btn btn-success mt-2">Add</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>➕ Add Review</h5>
        <a href="add_review.php" class="btn btn-success mt-2">Add</a>
      </div>
    </div>

    <!-- Search -->
    <div class="col-md-3">
      <div class="card p-3 text-center">
        <h5>🔍 Search Books</h5>
        <a href="search.php" class="btn btn-info text-white mt-2">Search</a>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
  }
</script>
</body>
</html>

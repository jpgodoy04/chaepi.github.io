<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .book-card img {
      height: 250px;
      object-fit: cover;
      border-top-left-radius: .5rem;
      border-top-right-radius: .5rem;
    }
    .book-card {
      transition: transform 0.2s ease;
    }
    .book-card:hover {
      transform: translateY(-5px);
    }
  </style>
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">📚 All Books</h2>
    <div class="row g-4">
      <?php
      $result = $conn->query("SELECT books.id, books.title, books.cover_image, authors.name 
                              FROM books 
                              JOIN authors ON books.author_id = authors.id");

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $title = htmlspecialchars($row['title']);
          $author = htmlspecialchars($row['name']);
          $coverImage = !empty($row['cover_image']) ? htmlspecialchars($row['cover_image']) : 'book1.jpg';

          echo "
          <div class='col-md-4'>
            <div class='card book-card h-100'>
              <img src='$coverImage' alt='Book Cover' class='card-img-top'>
              <div class='card-body'>
                <h5 class='card-title'>$title</h5>
                <p class='card-text text-muted'>by $author</p>
                <a href='book.php?id=$id' class='btn btn-primary btn-sm mt-2'>View Details</a>
              </div>
            </div>
          </div>";
        }
      } else {
        echo "<p class='text-muted'>No books found.</p>";
      }
      ?>
    </div>

    <div class="mt-5 text-center">
      <a href='index.php' class='btn btn-secondary'>&larr; Back to Home</a>
    </div>
  </div>
</body>
</html>

<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>📚 Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f6fa;
      color: #2d3436;
    }
    .card {
      border: none;
      border-radius: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    .card-title {
      font-size: 1.2rem;
      font-weight: 600;
    }
    .card-img-top {
      height: 250px;
      object-fit: cover;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }
    .btn-primary {
      background-color: #0984e3;
      border: none;
    }
    .btn-primary:hover {
      background-color: #74b9ff;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">📘 All Books</h2>

    <div class="row g-4">
      <?php
      $result = $conn->query("SELECT books.id, books.title, books.cover_image, authors.name 
                              FROM books 
                              JOIN authors ON books.author_id = authors.id");

      while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = htmlspecialchars($row['title']);
        $author = htmlspecialchars($row['name']);
        $coverImage = !empty($row['cover_image']) ? htmlspecialchars($row['cover_image']) : 'default-book.png';

        echo "
        <div class='col-md-4'>
          <div class='card h-100'>
            <img src='$coverImage' class='card-img-top' alt='Book cover'>
            <div class='card-body d-flex flex-column'>
              <h5 class='card-title'>$title</h5>
              <p class='text-muted mb-3'>by $author</p>
              <a href='book.php?id=$id' class='btn btn-primary btn-sm mt-auto'>View Details</a>
            </div>
          </div>
        </div>";
      }
      ?>
    </div>
  </div>
</body>
</html>

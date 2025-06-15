<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Genre Details</title>
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
      font-size: 1.1rem;
      font-weight: 600;
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
    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $genre = $conn->query("SELECT * FROM genres WHERE id = $id")->fetch_assoc();
        if ($genre) {
            $genreName = htmlspecialchars($genre['name']);
            echo "<h2 class='mb-4'>📚 $genreName</h2>";

            $books = $conn->query("SELECT books.id, books.title, authors.name 
                                   FROM books 
                                   JOIN authors ON books.author_id = authors.id
                                   WHERE books.genre_id = $id");

            if ($books->num_rows > 0) {
              echo "<div class='row g-4'>";
              while ($book = $books->fetch_assoc()) {
                $bookId = $book['id'];
                $bookTitle = htmlspecialchars($book['title']);
                $authorName = htmlspecialchars($book['name']);

                echo "
                <div class='col-md-4'>
                  <div class='card h-100 p-3'>
                    <div class='card-body d-flex flex-column'>
                      <h5 class='card-title'>$bookTitle</h5>
                      <p class='text-muted mb-3'>by $authorName</p>
                      <a href='book.php?id=$bookId' class='btn btn-primary btn-sm mt-auto'>View Book</a>
                    </div>
                  </div>
                </div>";
              }
              echo "</div>";
            } else {
              echo "<p>No books found for this genre.</p>";
            }

        } else {
            echo "<p>Genre not found.</p>";
        }
    } else {
        echo "<p>No genre selected.</p>";
    }
    ?>
    <a href='genres.php' class='btn btn-secondary mt-4'>Back to Genres</a>
  </div>
</body>
</html>

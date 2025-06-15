<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $book = $conn->query("SELECT books.title, books.description, authors.name AS author, genres.name AS genre
                              FROM books 
                              JOIN authors ON books.author_id = authors.id
                              JOIN genres ON books.genre_id = genres.id
                              WHERE books.id = $id")->fetch_assoc();

        if ($book) {
            $title = htmlspecialchars($book['title']);
            $description = nl2br(htmlspecialchars($book['description']));
            $author = htmlspecialchars($book['author']);
            $genre = htmlspecialchars($book['genre']);
    ?>

      <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-body">
          <h2 class="card-title mb-3"><?php echo $title; ?></h2>
          <p><strong>Author:</strong> <?php echo $author; ?></p>
          <p><strong>Genre:</strong> <?php echo $genre; ?></p>
          <p class="card-text mt-3"><?php echo $description; ?></p>
        </div>
      </div>

    <?php
        } else {
            echo "<p class='text-danger'>Book not found.</p>";
        }
    } else {
        echo "<p class='text-muted'>No book selected.</p>";
    }
    ?>
    <div class="mt-4">
      <a href='books.php' class='btn btn-secondary'>Back to Books</a>
    </div>
  </div>
</body>
</html>

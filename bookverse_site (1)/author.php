<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Author Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .book-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <a href='authors.php' class='btn btn-outline-secondary mb-4'>&larr; Back to Authors</a>

    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("SELECT * FROM authors WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $authorResult = $stmt->get_result();

        if ($authorResult->num_rows > 0) {
            $author = $authorResult->fetch_assoc();
            ?>

            <div class="mb-5">
              <h1 class="display-5"><?php echo htmlspecialchars($author['name']); ?></h1>
              <p class="lead mt-3"><?php echo nl2br(htmlspecialchars($author['bio'])); ?></p>
            </div>

            <h3 class="mb-4">Books by <?php echo htmlspecialchars($author['name']); ?></h3>

            <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
              $bookStmt = $conn->prepare("SELECT * FROM books WHERE author_id = ?");
              $bookStmt->bind_param("i", $id);
              $bookStmt->execute();
              $bookResult = $bookStmt->get_result();

              if ($bookResult->num_rows > 0) {
                  while ($book = $bookResult->fetch_assoc()) {
            ?>
              <div class="col">
                <div class="card h-100 book-card">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars(mb_strimwidth($book['description'], 0, 120, '...')); ?></p>
                    <a href="book.php?id=<?php echo $book['id']; ?>" class="btn btn-primary">View Book</a>
                  </div>
                </div>
              </div>
            <?php
                  }
              } else {
                  echo "<p class='text-muted'>No books found for this author.</p>";
              }
            ?>
            </div>

            <?php
        } else {
            echo "<p class='text-danger'>Author not found.</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='text-muted'>No author selected.</p>";
    }
    ?>

  </div>
</body>
</html>

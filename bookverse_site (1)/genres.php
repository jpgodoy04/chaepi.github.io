<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Genres</title>
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
      cursor: pointer;
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
    <h2 class="mb-4">🎨 All Genres</h2>

    <div class="row g-4">
      <?php
      $result = $conn->query("SELECT * FROM genres");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $genreId = $row['id'];
          $genreName = htmlspecialchars($row['name']);
          echo "
          <div class='col-md-4'>
            <a href='genre.php?id=$genreId' class='text-decoration-none text-dark'>
              <div class='card h-100 p-3'>
                <div class='card-body d-flex flex-column justify-content-center align-items-center'>
                  <h5 class='card-title text-center'>$genreName</h5>
                </div>
              </div>
            </a>
          </div>";
        }
      } else {
        echo "<p>No genres found.</p>";
      }
      ?>
    </div>

    <div class="mt-5 text-center">
      <a href="index.php" class="btn btn-secondary">&larr; Back to Home</a>
    </div>

  </div>
</body>
</html>

<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reviews</title>
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
    }
    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }
    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
    }
    .rating {
      color: #f1c40f;
      font-size: 1rem;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4">⭐ Reviews</h2>

    <div class="row g-4">
      <?php
      $result = $conn->query("
        SELECT reviews.id, books.title AS book_title, reviewer_name, content, rating 
        FROM reviews 
        JOIN books ON reviews.book_id = books.id
      ");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='col-md-6'>
                  <div class='card p-3 h-100'>
                    <div class='card-body'>
                      <h5 class='card-title'>{$row['book_title']}</h5>
                      <p class='mb-1'><strong>Reviewer:</strong> {$row['reviewer_name']}</p>
                      <p class='rating mb-2'>Rating: " . str_repeat("⭐", $row['rating']) . "</p>
                      <p class='text-muted'>{$row['content']}</p>
                    </div>
                  </div>
                </div>";
        }
      } else {
        echo "<p>No reviews found.</p>";
      }
      ?>
    </div>
    
    <a href='index.php' class='btn btn-secondary mt-4'>Back to Home</a>
  </div>
</body>
</html>

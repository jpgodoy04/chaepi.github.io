<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .author-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .author-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4">Authors</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      $result = $conn->query("SELECT * FROM authors");

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $authorName = htmlspecialchars($row['name']);
              ?>

              <div class="col">
                <div class="card h-100 author-card">
                  <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $authorName; ?></h5>
                    <a href="author.php?id=<?php echo $row['id']; ?>" class="btn btn-primary mt-2">View Details</a>
                  </div>
                </div>
              </div>

              <?php
          }
      } else {
          echo "<p class='text-muted'>No authors found.</p>";
      }
      ?>
    </div>
  </div>
</body>
</html>

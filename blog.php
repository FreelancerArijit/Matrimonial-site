<?php require('config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="Description" content="Enter your description here" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  />
  <link rel="stylesheet" href="./css/custom.css" />
  <link
    rel="icon"
    type="image/png"
    href="images/favicon.jpg"
    sizes="20x20"
  />
  <title>ShadiWadi.com</title>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main.flex-fill {
      flex: 1 0 auto; /* allow main content to grow and fill space */
    }
    footer {
      background-color: #c00745;
      color: white;
      flex-shrink: 0; /* don’t shrink footer */
      padding: 1rem 0;
    }
  </style>
</head>
<body>
  <?php include_once('components/header.php'); ?>

  <main class="container py-5 flex-fill">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-dark">Success Stories</h2>
      <a href="stories.php" class="btn theme-btn">Share Your Story</a>
    </div>

    <div class="row">
      <?php
      $query = "SELECT id, story_title, description, story_image FROM story WHERE published = 1 ORDER BY creation_at DESC";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $image = !empty($row['story_image']) ? $row['story_image'] : './images/default.jpg';
          $desc_clean = strip_tags($row['description']);
          $short_desc = mb_substr($desc_clean, 0, 90) . (mb_strlen($desc_clean) > 90 ? '...' : '');
          ?>
          <div class="col-md-4 mb-4">
            <div class="card card-hover h-100 p-3">
              <img
                src="<?php echo htmlspecialchars($image); ?>"
                class="card-img-top image-fluid w-100 mx-auto" style="height: 250px;" alt="Success Story 1""
                alt="Success Story"
              />
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['story_title']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($short_desc); ?></p>
                <a
                  href="viewStory.php?id=<?php echo $row['id']; ?>"
                  class="btn btn-outline-primary btn-sm mt-2 px-3 py-2" style="background-color: #c00745; border: none; color: white;"
                  >View Full Story</a
                >
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        echo '<div class="col-12"><p class="text-muted">No published stories available yet.</p></div>';
      }
      ?>
    </div>
  </main>

  <footer class="container-fluid text-center">
    <?php include_once('components/footer.php'); ?>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

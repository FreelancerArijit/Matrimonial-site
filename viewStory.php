<?php
require('config.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid story ID.";
    exit;
}

$story_id = (int)$_GET['id'];

$query = "SELECT story_title, description, story_image, creation_at FROM story WHERE id = $story_id AND published = 1";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Story not found or not published.";
    exit;
}

$story = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo htmlspecialchars($story['story_title']); ?> - ShadiWadi.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="./css/custom.css" />
</head>
<body>

<?php include_once('components/header.php'); ?>

<div class="container py-5">
    <div class="card">
        <?php if (!empty($story['story_image'])): ?>
            <img src="<?php echo htmlspecialchars($story['story_image']); ?>" class="card-img-top" alt="Story Image" style="max-height: 400px; object-fit: contain;">
        <?php endif; ?>
        <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars($story['story_title']); ?></h2>
            <p class="text-muted">Published on: <?php echo date('F j, Y', strtotime($story['creation_at'])); ?></p>
            <p class="card-text"><?php echo nl2br(htmlspecialchars($story['description'])); ?></p>
            <a href="blog.php" class="btn btn-secondary mt-3">Back to Stories</a>
        </div>
    </div>
</div>

<?php include_once('components/footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
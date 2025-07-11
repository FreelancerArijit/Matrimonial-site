<?php
require('config.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

// Check if ID is sent via POST
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "Invalid Story ID.";
    exit;
}

$id = intval($_POST['id']); // sanitize input

// Query story details using mysqli_query
$sql = "SELECT Customer_Name, story_title, story_image, description, creation_at FROM story WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) === 1) {
    $story = mysqli_fetch_assoc($result);
} else {
    echo "Story not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Story Details - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
<?php require('./components/menu.php'); ?>

<div class="container-fluid mt-2">
    <h2> Story Details</h2>
    <div class="card">
        <div class="card-header">
            <h3><?php echo htmlspecialchars($story['story_title']); ?></h3>
            <small class="text-muted">By: <?php echo htmlspecialchars($story['Customer_Name']); ?> | Created on: <?php echo $story['creation_at']; ?></small>
        </div>
       <div class="card-body d-flex flex-column flex-md-row align-items-start">
    <?php if (!empty($story['story_image'])): ?>
        <img src="<?php echo htmlspecialchars($story['story_image']); ?>" alt="Story Image" 
             class="img-fluid mb-3 mb-md-0 mr-md-3" style="max-height: 300px; width: auto;">
    <?php endif; ?>
    
    <div>
        <h3> DESCRIPTION </h3>
        <p><?php echo nl2br(htmlspecialchars($story['description'])); ?></p>
    </div>
</div>
        <div class="card-footer">
            <a href="StoryList.php" class="btn btn-secondary">Back to Stories List</a>
        </div>
        </div> <?php include_once('components/footer.php'); ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
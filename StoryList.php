<?php
require('config.php');

// Check admin login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

// Fetch all stories
$sql = "SELECT s.id, s.Customer_Name, s.story_title, s.story_image, s.description, s.creation_at, s.published FROM story s ORDER BY s.creation_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stories List - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
</head>
<body>
<?php require('./components/menu.php') ?>
<script>
  // Wait 3 seconds then fade out the flash message
  setTimeout(function() {
    const flash = document.getElementById('flash-message');
    if(flash) {
      flash.style.transition = "opacity 0.5s ease";
      flash.style.opacity = '0';
      setTimeout(() => flash.style.display = 'none', 500); // remove from layout after fade out
    }
  }, 3000);
</script>

<div class="container-fluid mt-2">
   
<!-- Display success or error messages -->
<div class="container mt-2">
<?php
if (isset($_SESSION['message'])) {
    echo '<div id="flash-message" class="alert alert-success">' . htmlspecialchars($_SESSION['message']) . '</div>';
    unset($_SESSION['message']);
}

if (isset($_SESSION['error'])) {
    echo '<div id="flash-message" class="alert alert-danger">' . htmlspecialchars($_SESSION['error']) . '</div>';
    unset($_SESSION['error']);
}
?>
</div>

</div>
    <h2> Success Stories</h2>
     <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Story ID</th>
                <th>Customer Name</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Created At</th>
                <th>View Details</th>
                <th colspan="4"> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['Customer_Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['story_title']); ?></td>
                        <td>
                            <?php if ($row['story_image']): ?>
                                <img src="<?php echo htmlspecialchars($row['story_image']); ?>" alt="Story Image" width="100" />
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td><?php 
                            $desc = strip_tags($row['description']); // remove HTML tags
                            echo htmlspecialchars(strlen($desc) > 30 ? substr($desc, 0, 30).'...' : $desc); 
                        ?></td>
                        <td><?php echo $row['creation_at']; ?></td>
                        <td>
                            <form action="StoryDetails.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-primary btn-sm">View Story</button>
                        </form>
                         <td>
                
                        
                        <td>
                        <form action="TogglePublishStory.php" method="post">
                         <input type="hidden" name="story_id" value="<?php echo $row['id']; ?>">
                         <input type="hidden" name="published" value="<?php echo $row['published'] ? 0 : 1; ?>">
                        <button type="submit" class="btn btn-<?php echo $row['published'] ? 'warning' : 'success'; ?> btn-sm">
                         <?php echo $row['published'] ? 'Unpublish' : 'Publish'; ?>
                        </button>
                        </form>
                        </td>

                        <td>
                                <form action="DeleteStoryByAdmin.php" method="post" onsubmit="return confirm('Are you sure you want to delete this story?');">
                                    <input type="hidden" name="story_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
    
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">No stories found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
            </div>
    <?php include_once('components/footer.php'); ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require('config.php');


// Check admin login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['story_id'])) {
    $story_id = intval($_POST['story_id']);

    // Delete query using mysqli_query()
    $sql = "DELETE FROM story WHERE id = $story_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Story deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete the story.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

header("Location: StoryList.php"); // Change this to your actual list page filename
exit;
?>

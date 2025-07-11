<?php
require('config.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $story_id = intval($_POST['story_id']);
    $published = intval($_POST['published']); // 1 or 0

    $query = "UPDATE story SET published = $published WHERE id = $story_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = $published ? "Story published successfully." : "Story unpublished successfully.";
    } else {
        $_SESSION['error'] = "Failed to update story publish status.";
    }
}

header("Location: StoryList.php");
exit;

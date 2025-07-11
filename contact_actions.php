<?php
require('config.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ref_no = mysqli_real_escape_string($conn, $_POST['ref_no']);

    if (isset($_POST['mark_read'])) {
        $updateQuery = "UPDATE contacts SET status = 'read' WHERE ref_no = '$ref_no'";
        mysqli_query($conn, $updateQuery);
    }

    if (isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM contacts WHERE ref_no = '$ref_no'";
        mysqli_query($conn, $deleteQuery);
    }

    header("Location: view_contact.php");
    exit;
}
?>

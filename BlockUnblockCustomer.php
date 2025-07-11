<?php
require('config.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_status'])) {
    $customer_id = intval($_POST['customer_id']);
    $current_status = $_POST['current_status'];

    $new_status = ($current_status === 'blocked') ? 'active' : 'blocked';

    $updateQuery = "UPDATE customers SET status = '$new_status' WHERE id = $customer_id";

    if (mysqli_query($conn, $updateQuery)) {
        $msg = ($new_status === 'blocked') ? "User has been blocked." : "User has been unblocked.";
        header("Location: CustomerList.php?msg=" . urlencode($msg));
        exit;
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>

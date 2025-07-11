<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_profile'])) {
    $id = intval($_POST['customer_id']);
    // Optional: Validate existence before delete
    $check = mysqli_query($conn, "SELECT id FROM user_profiles WHERE id = $id");
    if ($check && mysqli_num_rows($check) > 0) {
        $delete = "DELETE FROM user_profiles WHERE id = $id";
        $update="UPDATE Customers SET profile_created=0 WHERE id=$id";
        
        if (mysqli_query($conn, $delete)) {
             mysqli_query($conn, $update); 
            echo "<script>alert('Profile deleted successfully!'); window.location.href='MatrimonialList.php';</script>";
            exit;
        } else {
            echo "Delete failed: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Profile not found.'); window.location.href='MatrimonialList.php';</script>";
    }
} else {
    echo "Invalid Request!";
    exit;
}

?>
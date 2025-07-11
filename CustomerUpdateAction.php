<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_customer'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    // Check if the new email exists for a different customer
    $checkQuery = "SELECT id FROM Customers WHERE email='$email' AND id != $id";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email already exists. Please use a different email.'); window.location.href='CustomerList.php';</script>";
        exit;
    }

    $updateQuery = "UPDATE Customers SET name='$name', email='$email', mobile='$mobile' WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: CustomerList.php?msg=Customer Updated Successfully");
        exit();
    } else {
        echo "Error updating customer: " . mysqli_error($conn);
        exit;
    }
}
?>
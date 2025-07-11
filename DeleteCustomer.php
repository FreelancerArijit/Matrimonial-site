<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_delete'])) {
    // Sanitize and validate the input
    $customer_id = intval($_POST['customer_id']);
    // Step 1: Delete from 'story' table to handle foreign key constraint

    $deleteStoriesQuery = "DELETE FROM story WHERE user_id = $customer_id";
    if (!mysqli_query($conn, $deleteStoriesQuery)) {
        echo "Error deleting stories: " . mysqli_error($conn);
        header('location:CustomerList.php');
        exit;
    }
       // Check if any user_profiles exist for this customer
    $checkProfileQuery = "SELECT id FROM user_profiles WHERE cust_id = $customer_id";
    $checkResult = mysqli_query($conn, $checkProfileQuery);


    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Delete profiles if they exist
        $deleteProfileQuery = "DELETE FROM user_profiles WHERE cust_id = $customer_id";
        mysqli_query($conn, $deleteProfileQuery);
    }
    // Always delete the customer
    $deleteCustomerQuery = "DELETE FROM Customers WHERE id = $customer_id";
    mysqli_query($conn, $deleteCustomerQuery);
     $query = "DELETE FROM Customers WHERE id = $customer_id";
      if (mysqli_query($conn, $query)) {
        header("Location: CustomerList.php?msg=customer Deleted Sucessfully");
        exit();
         } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
} else {
    echo "Invalid request.";
}
?>
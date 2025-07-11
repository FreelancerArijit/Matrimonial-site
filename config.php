<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "matrimonial_site";
$port = "3307";

// check connection
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check if connection Failed ?
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 👇 Check if logged-in user is blocked
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Get user's status from the database
    $status_query = "SELECT status FROM customers WHERE id = $user_id LIMIT 1";
    $status_result = mysqli_query($conn, $status_query);

    if ($status_result && mysqli_num_rows($status_result) > 0) {
        $user_data = mysqli_fetch_assoc($status_result);
        if ($user_data['status'] === 'blocked') {
            // Destroy session and redirect to login
            session_unset();
            session_destroy();
            echo "<script>alert('Your account has been blocked. Please contact Administrator.');</script>";
            echo '<meta http-equiv="refresh" content="0;url=userLogin.php">';
            exit;
        }
    }
}
?>


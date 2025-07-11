<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user by email
    $query = "SELECT * FROM Customers WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

         if ($user['status'] === 'blocked') {
            echo "<script>alert('Your account has been blocked. Please contact support.');</script>";
            echo '<meta http-equiv="refresh" content="1;url=userLogin.php">';
            exit;
        }
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];

            // Step-by-step redirection
            if ($user['profile_created'] == 0) {
                // Redirect to profile creation
                header("Location: createProfile.php");
                exit;
            } elseif ($user['preference_created'] == 0) {
                // Redirect to preference creation
                header("Location: addPreference.php");
                exit;
            } else {
                // Redirect to main profile page
                header("Location: profile.php");
                exit;
            }
        } else {
            echo "<script>alert('Incorrect Password! Please Try again....');</script>";
            echo '<meta http-equiv="refresh" content="1;url=userLogin.php">';
            exit;
        }
    } else {
        echo "<script>alert('User not found! Please enter a valid email.');</script>";
        echo '<meta http-equiv="refresh" content="1;url=userLogin.php">';
        exit;
    }
}
?>

<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_update'])) {
    // Step 1: Show update form
    $id = intval($_POST['customer_id']);
    $query = "SELECT * FROM user_profiles WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $rec = mysqli_fetch_assoc($result);
    } else {
        echo "Invalid user!";
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    // Step 2: Handle form submission
    $id = intval($_POST['id']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $profile_for = mysqli_real_escape_string($conn, $_POST['profile_for']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lives_in = mysqli_real_escape_string($conn, $_POST['lives_in']);
    $mother_tongue = mysqli_real_escape_string($conn, $_POST['mother_tongue']);
    $education_level = mysqli_real_escape_string($conn, $_POST['education_level']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
     $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);

    
    // Check if email or mobile already exists for another profile
    $checkQuery = "SELECT id FROM user_profiles 
                   WHERE (email = '$email' OR mobile = '$mobile') 
                   AND id != $id";

    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email or Mobile number already exists for another user!'); window.location.href='MatrimonialList.php';</script>";
        exit;
    }

    $update = "UPDATE user_profiles SET 
        full_name = '$full_name', 
        profile_for = '$profile_for', 
        mobile = '$mobile', 
        email = '$email',
        lives_in = '$lives_in',
        mother_tongue = '$mother_tongue',
        education_level = '$education_level',
        occupation = '$occupation',
        father_name='$father_name',
        mother_name='$mother_name'
        WHERE id = $id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='MatrimonialList.php';</script>";
        exit;
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Request!";
    exit;
}
?>

<?php if (isset($rec)): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Update Profile</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?php echo $rec['full_name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Profile For</label>
            <input type="text" name="profile_for" class="form-control" value="<?php echo $rec['profile_for']; ?>" required>
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" value="<?php echo $rec['mobile']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $rec['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Lives In</label>
            <input type="text" name="lives_in" class="form-control" value="<?php echo $rec['lives_in']; ?>">
        </div>
        <div class="form-group">
            <label>Mother Tongue</label>
            <input type="text" name="mother_tongue" class="form-control" value="<?php echo $rec['mother_tongue']; ?>">
        </div>
        <div class="form-group">
            <label>Education</label>
            <input type="text" name="education_level" class="form-control" value="<?php echo $rec['education_level']; ?>">
        </div>
        <div class="form-group">
            <label>Occupation</label>
            <input type="text" name="occupation" class="form-control" value="<?php echo $rec['occupation']; ?>">
        <div class="form-group">
            <label>Father Name</label>
            <input type="text" name="father_name" class="form-control" value="<?php echo $rec['father_name']; ?>">
        </div>
        <div class="form-group">
            <label>Mother Name</label>
            <input type="text" name="mother_name" class="form-control" value="<?php echo $rec['mother_name']; ?>">
        </div>
        </div>
        <button type="submit" name="update_profile" class="btn btn-success">Update</button>
        <a href="MatrimonialList.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
<?php endif; ?>

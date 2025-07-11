<?php
require('config.php');
   
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}
$user_id = $_SESSION['user_id']; 

if(isset($_POST['submit'])){

function processImageUpload($fileInputName, $oldImagePath, $uploadDir = 'uploads/') {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES[$fileInputName]['tmp_name'];
        $ext = strtolower(pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            $newImageName = uniqid('img_', true) . '.' . $ext;
            $targetPath = $uploadDir . $newImageName;

            if (move_uploaded_file($tmpName, $targetPath)) {
                // Delete old image if it exists and is different
                if (!empty($oldImagePath) && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                return $targetPath;
            }
        }
    }
    return $oldImagePath; // Return old path if no new image is uploaded
}


// Fetch current image paths from DB
$query = "SELECT profile_picture, other_picture1, other_picture2, other_picture3, other_picture4 FROM user_profiles WHERE cust_id='$user_id'";

$result = mysqli_query($conn, $query) or die("MySQL Error: " . mysqli_error($conn));
$currentImages = mysqli_fetch_assoc($result);

$profile_image = $currentImages['profile_picture'] ?? ''; 
$image1 = $currentImages['other_picture1'] ?? '';
$image2 = $currentImages['other_picture2'] ?? '';
$image3 = $currentImages['other_picture3'] ?? '';
$image4 = $currentImages['other_picture4'] ?? '';

    // Upload new images if provided
if (isset($_FILES['profile-image']) && $_FILES['profile-image']['error'] === UPLOAD_ERR_OK) {
    $profile_image = processImageUpload('profile-image', $currentImages['profile_picture']);
}
if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
    $image1 = processImageUpload('image1', $currentImages['other_picture1']);
}
if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
    $image2 = processImageUpload('image2', $currentImages['other_picture2']);
}
if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
    $image3 = processImageUpload('image3', $currentImages['other_picture3']);
}
if (isset($_FILES['image4']) && $_FILES['image4']['error'] === UPLOAD_ERR_OK) {
    $image4 = processImageUpload('image4', $currentImages['other_picture4']);
}

    $profile_for = mysqli_real_escape_string($conn,$_POST['reg-for']);
    $full_name = mysqli_real_escape_string($conn,$_POST['name']);
    $age = mysqli_real_escape_string($conn,$_POST['age']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $has_siblings = mysqli_real_escape_string($conn,$_POST['Siblings']);
    $lives_in = mysqli_real_escape_string($conn,$_POST['lives_in']);
    $hometown = mysqli_real_escape_string($conn,$_POST['hometown']);
    $district = mysqli_real_escape_string($conn,$_POST['dist']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
    $religion = mysqli_real_escape_string($conn,$_POST['religion']);
    $mother_tongue = mysqli_real_escape_string($conn,$_POST['mothertounge']);
    $height =mysqli_real_escape_string($conn,$_POST['height']);
    $weight = mysqli_real_escape_string($conn,$_POST['weight']);
    $skin_tone = mysqli_real_escape_string($conn,$_POST['skintone']);
    $education_level = mysqli_real_escape_string($conn,$_POST['edu']);
    $occupation = mysqli_real_escape_string($conn,$_POST['occu']);
    $about_me = mysqli_real_escape_string($conn,$_POST['story']);
    $father_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $father_occupation = mysqli_real_escape_string($conn,$_POST['foccu']);
    $mother_name = mysqli_real_escape_string($conn,$_POST['mname']);
    $mother_occupation = mysqli_real_escape_string($conn,$_POST['moccu']);

 $update="UPDATE user_profiles SET profile_for='$profile_for', full_name='$full_name', age='$age', dob='$dob', mobile='$mobile', email='$email',gender='$gender',has_siblings='$has_siblings', lives_in='$lives_in',hometown='$hometown',district='$district', state='$state',religion='$religion',mother_tongue='$mother_tongue',height='$height',weight='$weight',skin_tone='$skin_tone',education_level='$education_level',occupation='$occupation',about_me='$about_me',profile_picture='$profile_image',other_picture1='$image1',other_picture2='$image2',other_picture3='$image3', other_picture4='$image4',father_name='$father_name',father_occupation='$father_occupation',mother_name='$mother_name',mother_occupation='$mother_occupation' WHERE cust_id='$user_id'";

$query2 = mysqli_query($conn, $update) or die("MySQL Error: " . mysqli_error($conn));
if($query2){
    echo "<script>alert('Profile updated successfully!');window.location.href='profile.php';</script>";
} else{
     echo "<script>alert('Error! Please try again later...');window.location.href='profile.php';</script>";
}
}
?>
<?php
 require('config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="./css/custom.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
<title>ShadiWadi.com</title>
</head>
<body>
    <?php include_once('components/header.php');
    

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}
$user_id = $_SESSION['user_id']; 
$check_sql = "SELECT * FROM user_profiles WHERE cust_id = '$user_id'";
$check_res = mysqli_query($conn, $check_sql);
if (mysqli_num_rows($check_res) > 0) {
    // Profile exists, show error or update instead of insert
    echo "<p class='text-danger text-center' font-size: 20px;>Profile already created. You cannot create multiple profiles.</p>";
    echo '<meta http-equiv="refresh" content="3;url=login.php">';
    exit;
} else {
    // BackEnd Store Logic
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Handle image uploads
    function uploadImage($inputName) {
          $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $uploadDir  = "uploads/";
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $imageName = basename($_FILES[$inputName]['name']);
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExtensions)) {
            return null; // or you can return an error message or throw exception
           }
           $newImageName = uniqid('img_', true) . '.' . $ext;
            $uploadPath = $uploadDir . $newImageName;
             if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadPath)) {
              return $uploadPath;
           }
        return null;
    }
  }

    // Upload images
    $profile_picture = uploadImage('profile-image');
    $image1 = uploadImage('image1');
    $image2 = uploadImage('image2');
    $image3 = uploadImage('image3');
    $image4 = uploadImage('image4');

    // Collect form data
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

    // Insert Data into Database 
    $sql = "INSERT INTO user_profiles (
    cust_id, profile_for, full_name, age, dob, mobile, email, gender, has_siblings,
    lives_in, hometown, district, state, religion, mother_tongue,
    height, weight, skin_tone, education_level, occupation, about_me,
    profile_picture, other_picture1, other_picture2, other_picture3, other_picture4,
    father_name, father_occupation, mother_name, mother_occupation
) VALUES (
   '$user_id', '$profile_for', '$full_name', '$age', '$dob', '$mobile', '$email', '$gender', '$has_siblings',
    '$lives_in', '$hometown', '$district', '$state', '$religion', '$mother_tongue',
    '$height', '$weight', '$skin_tone', '$education_level', '$occupation', '$about_me',
    '$profile_picture', '$image1', '$image2', '$image3', '$image4',
    '$father_name', '$father_occupation', '$mother_name', '$mother_occupation'
)";

$res=mysqli_query($conn, $sql);
if ($res){
     echo "<p class='text-success text-center'>Profile Created Sccessfully ! Redirecting to Partner Preference Page....</p>";
    $updateProfile = "UPDATE Customers SET profile_created=1 WHERE id='$user_id'";
    mysqli_query($conn, $updateProfile);
    echo '<meta http-equiv="refresh" content="1;url=addPreference.php">';
    exit;
} else {
     echo "<p class='text-success text-center'>Profile Created Not Sucessfull! Try again later</p>";
    // After 3 second page redirecting to Profile.php
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
    exit;
}
      }
    }
    ?>
    
    
    
  <div class="card p-3 m-auto mt-5" style="max-width: 800px;">
  <div class="card-header">
    <h3 class="text-center"> Create Profile</h3>
  </div>
  <div class="card-body pb-3">

    <!-- Form --> 
  <form method="POST" enctype="multipart/form-data">

     <div class="form-group col-6">
        <label for="images" class="form-label">Upload your profile picture here</label>
        <input type="file"  id="profile-image" name="profile-image" required aria-describedby="nameHelp">
      </div>

       <fieldset class="form-group">    
        <legend class="col-form-label pt-0">Create profile as</legend>   
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="Bride" value="Bride" required>
            <label class="form-check-label" for="Bride">Bride</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="Groom" value="Groom" required>
            <label class="form-check-label" for="Groom">groom</label>
          </div>

</div>
</fieldset>


      <!-- Name -->
      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Ronit Roy" id="name" name="name" required aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="age" class="form-label">Age</label>
        <input type="number" placeholder="26" class="form-control" id="age" name="age" required aria-describedby="nameHelp">
      </div>

      <!-- Date of Birth -->
      <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" required aria-describedby="dobHelp">
      </div>

      <!-- Mobile Number -->
      <div class="form-group">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="mobile" name="mobile" required aria-describedby="mobileHelp" placeholder="+91 7865095896">
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="abc@gmail.com" id="email" name="email" required aria-describedby="emailHelp">
      </div>

      <!-- Gender -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Gender</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" required>
            <label class="form-check-label" for="gender_male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" required>
            <label class="form-check-label" for="gender_female">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_other" value="Other" required>
            <label class="form-check-label" for="gender_other">Other</label>
          </div>
        </div>
      </fieldset>

      <!-- Siblings -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Siblings</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Siblings" id="" value="yes" required>
            <label class="form-check-label" for="yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Siblings" id="" value="no" required>
            <label class="form-check-label" for="no">No</label>
          </div>         
        </div>
      </fieldset>

      <!-- City -->
      <div class="form-group">
        <label for="livesin" class="form-label">Lives in</label>
        <input type="text" placeholder="Kolkata" class="form-control" id="lives_in" name="lives_in" required aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="hometown" class="form-label">Home town</label>
        <input type="text" placeholder="Malda" class="form-control" id="hometown" name="hometown" required aria-describedby="nameHelp">
      </div>

       <div class="form-group">
        <label for="district" class="form-label">District</label>
        <input type="text" placeholder="Hooghly" class="form-control" id="dist" name="dist" required aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="state" class="form-label">State</label>
        <input type="text" placeholder="West Bengal" class="form-control" id="state" name="state" required aria-describedby="nameHelp">
      </div>

      

      <!-- Religion -->
      <div class="form-group">
        <label for="religion" class="form-label">Religion</label>
        <select class="form-control" id="religion" name="religion" required aria-describedby="religionHelp">
          <option value="">Select a religion</option>
          <option value="hindu">Hindu</option>
          <option value="muslim">Muslim</option>
          <option value="christian">Christian</option>
          <!-- Add more religions here -->
        </select>
      </div>

       <div class="form-group">
        <label for="mothertounge" class="form-label">Mother tounge</label>
        <input type="text" placeholder="Bengali" class="form-control" id="mothertounge" name="mothertounge" required aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="height" class="form-label">Height</label>
        <input type="number" step="0.1" placeholder="5.7" class="form-control" id="height" name="height" required aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="weight" class="form-label">Weight</label>
        <input type="number" placeholder="67" class="form-control" id="weight" name="weight" required aria-describedby="nameHelp">
      </div>


       <!-- skin tone -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Skin tone</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="fair" required>
            <label class="form-check-label" for="fair">Fair</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="black" required>
            <label class="form-check-label" for="black">Black</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="Other" required>
            <label class="form-check-label" for="brown">Brown</label>
          </div>
        </div>
      </fieldset>

      <div class="form-group">
        <label for="height" class="form-label">Heighest level of education</label>
        <input type="text" placeholder="Engineering" class="form-control" id="edu" name="edu" required aria-describedby="nameHelp">
      </div>

       <div class="form-group">
        <label for="occu" class="form-label">Occupation</label>
        <input type="text" placeholder="Software Engineer" class="form-control" id="occu" name="occu" required aria-describedby="nameHelp">
      </div>
     
       <div class="form-group">
        <label for="about" class="form-label">About me</label>
         <textarea name="story" id="myTextArea" cols="90" rows="5" class="form-control"  placeholder="Write about the bride or groom" style="padding: 10px 20px; border-radius: 8px; " ></textarea>

      </div>

      
            

      

     

      <div class="form-group col-12">
        <label for="images" class="form-label">Upload other pictures here</label>
        <div class="row">
        <input type="file" class="mb-2"  id="image1" name="image1" required aria-describedby="nameHelp">
        <input type="file" class="mb-2"   id="image2" name="image2" required aria-describedby="nameHelp">
        <input type="file"  id="image3" name="image3" required aria-describedby="nameHelp">
        <input type="file"  id="image4" name="image4" required aria-describedby="nameHelp">



        </div>
      </div>


      <!-- father Name -->
      <div class="form-group">
        <label for="fname" class="form-label">Father's name</label>
        <input type="text" class="form-control" placeholder="Ranjit Roy" id="fname" name="fname" required aria-describedby="nameHelp">
      </div>

      <!-- father occupation -->
      <div class="form-group">
        <label for="foccupation" class="form-label">Father's occupation</label>
        <input type="text" class="form-control" placeholder="Jobs" id="foccu" name="foccu" required aria-describedby="nameHelp">
      </div>

       <!-- mother Name -->
      <div class="form-group">
        <label for="mname" class="form-label">Mothers's name</label>
        <input type="text" class="form-control" placeholder="Rani Roy" id="mname" name="mname" required aria-describedby="nameHelp">
      </div>

        <!-- mothers occupation -->
      <div class="form-group">
        <label for="moccupation" class="form-label">Mother's occupation</label>
        <input type="text" class="form-control" placeholder="Housewife" id="moccu" name="moccu" required aria-describedby="nameHelp">
      </div>


      <button type="submit" class="btn btn-primary btn-block">Create Profile</button>

    </form>
  </div>
</div>


    
  
<div class="container-fluid mt-auto position-relative" style="top: 10%; background-color: #c00745; ">


<?php include_once('components/footer.php'); ?>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
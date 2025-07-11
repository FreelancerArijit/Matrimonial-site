<?php
 require('config.php');
  if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit;
} 


?>
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
   
$user_id = $_SESSION['user_id'];
// --- NEW CODE START ---
// Check if preference already exists for this user
$check_pref_sql = "SELECT cust_id FROM preferences WHERE cust_id = '$user_id' LIMIT 1";
$check_pref_result = mysqli_query($conn, $check_pref_sql);

if (mysqli_num_rows($check_pref_result) > 0) {
    // Preference already exists, redirect to profile page or show a message
    echo "<p class='text-danger text-center'>Your partner preference has already been added. Redirecting to your Profile Page...</p>";
    echo '<meta http-equiv="refresh" content="1;url=profile.php">'; // Redirect to profile page
    exit; // Stop script execution
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $cust_id=$_SESSION['user_id'];
  $preferred_profile_for = $_POST['look-for'];
    $preferred_age_min = $_POST['agefrom'];
    $preferred_age_max = $_POST['ageto'];
    $preferred_height = $_POST['height'];
    $preferred_weight = $_POST['weight'];
    $preferred_skin_tone = $_POST['skintone'];
    $preferred_religion = $_POST['religion'];
    $preferred_mother_tongue = $_POST['mothertounge'];
    $preferred_education_level = $_POST['edu'];
    $preferred_occupation = $_POST['occu'];
    $preferred_lives_in = $_POST['city'];
  $sql1="INSERT INTO preferences 
        (cust_id, preferred_profile_for, preferred_age_min, preferred_age_max, preferred_height, preferred_weight, preferred_skin_tone, preferred_religion, preferred_mother_tongue, preferred_education_level, preferred_occupation,  preferred_lives_in) 
        VALUES 
        ('$cust_id', '$preferred_profile_for', '$preferred_age_min', '$preferred_age_max', '$preferred_height', '$preferred_weight', '$preferred_skin_tone', '$preferred_religion', '$preferred_mother_tongue', '$preferred_education_level', '$preferred_occupation',  '$preferred_lives_in')";

     if (mysqli_query($conn, $sql1)) {
      echo "<p class='text-success text-center'>Partner Preference Created Successfully ! Redirecting to Profile Page....</p>";
      $updateProfile = "UPDATE Customers SET preference_created=1 WHERE id='$user_id'";
       mysqli_query($conn, $updateProfile);
        echo '<meta http-equiv="refresh" content="1;url=profile.php">';
        exit;

    } else {
        echo "<p class='text-success text-center'>Something Went Wrong! Try again later</p>";
         echo '<meta http-equiv="refresh" content="1;url=index.php">';
         exit;
    }
  }
    ?>  
  <div class="card p-3 m-auto mt-5" style="max-width: 800px;">
  <div class="card-header">
    <h3 class="text-center"> Add your preference</h3>
  </div>
  <div class="card-body pb-3">

    <!-- Form --> 
  <form method="POST" enctype="multipart/form-data">     

       <fieldset class="form-group">    
        <legend class="col-form-label pt-0">You are looking for</legend>   
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="look-for" id="Bride" value="Bride" required>
            <label class="form-check-label" for="Bride">Bride</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="look-for" id="Groom" value="Groom" required>
            <label class="form-check-label" for="Groom">Groom</label>
          </div>

</div>
</fieldset>


      <!-- Name -->
      <div class="form-group">
        
        <label for="name" class="form-label">Age from</label>
        <input type="number" class="form-control" placeholder="21" id="agefrom" name="agefrom" required aria-describedby="nameHelp" required>
        <label for="name" class="form-label">Age To</label>
        <input type="number" class="form-control" placeholder="26" id="ageto" name="ageto" required aria-describedby="nameHelp"required>  
   
    </div>

      

      

      

      

    

      <!-- City -->
      <div class="form-group">
        <label for="city" class="form-label">City</label>
        <input type="text" placeholder="Kolkata" class="form-control" id="city" name="city" required aria-describedby="nameHelp" required>
      </div>

      

      

      <!-- Religion -->
      <div class="form-group">
        <label for="religion" class="form-label">Religion</label>
        <select class="form-control" id="religion" name="religion" required aria-describedby="religionHelp" required>
          <option value="">Select a religion</option>
          <option value="hindu">Hindu</option>
          <option value="muslim">Muslim</option>
          <option value="christian">Christian</option>
          <!-- Add more religions here -->
        </select>
      </div>

       <div class="form-group">
        <label for="mothertounge" class="form-label">Mother tounge</label>
        <input type="text" placeholder="Bengali" class="form-control" id="mothertounge" name="mothertounge" required aria-describedby="nameHelp" required>
      </div>

      <div class="form-group">
        <label for="height" class="form-label">Height</label>
        <input type="number" step="0.1" placeholder="5.7" class="form-control" id="height" name="height" required aria-describedby="nameHelp" required>
      </div>

      <div class="form-group">
        <label for="weight" class="form-label">Weight</label>
        <input type="number" placeholder="67" class="form-control" id="weight" name="weight" required aria-describedby="nameHelp" required>
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
        <input type="text" placeholder="Engineering" class="form-control" id="edu" name="edu" required aria-describedby="nameHelp" required>
      </div>

       <div class="form-group">
        <label for="occu" class="form-label">Occupation</label>
        <input type="text" placeholder="Software Engineer" class="form-control" id="occu" name="occu" required aria-describedby="nameHelp" required>
      </div>
     

      
            

      

     

      

      

      <button type="submit" class="btn btn-primary btn-block">Add preference</button>

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
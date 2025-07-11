<?php require('config.php') ?>
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
 $src="SELECT *FROM user_profiles where cust_id=$user_id";
 $rs=mysqli_query($conn,$src) or die(mysqli_error($conn));
 $profile=mysqli_fetch_assoc($rs);
?>

    <div class="card p-3 m-auto mt-5" style="max-width: 800px;">
  <div class="card-header">
    <h3 class="text-center"> Edit Profile</h3>
  </div>
  <div class="card-body pb-3">

    <form method="POST" action="SaveUpdate.php" enctype="multipart/form-data">

     <div class="form-group col-6">
        <label for="images" class="form-label">Upload your profile picture here</label>
        <input type="file"  id="name" name="profile-image" aria-describedby="nameHelp">
        <img src="<?php echo $profile['profile_picture']; ?>" width="150" alt="Profile Picture">
      </div>

       <fieldset class="form-group">    
        <legend class="col-form-label pt-0">Create profile as</legend>   
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="bride" value="bride" 
              <?php if(strtolower($profile['profile_for']) == 'bride') echo 'checked'; ?>>
            <label class="form-check-label" for="bride">Bride</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="groom" value="groom" 
            <?php if (strtolower($profile['profile_for']) == 'groom') echo 'checked'; ?>>
            <label class="form-check-label" for="groom">groom</label>
          </div>

</div>
</fieldset>


      <!-- Name -->
      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="<?php echo ($profile['full_name']); ?>" id="name" name="name"  aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="age" class="form-label">Age</label>
        <input type="number"  class="form-control" id="age" value="<?php echo htmlspecialchars($profile['age']); ?>" name="age"  aria-describedby="nameHelp">
      </div>

      <!-- Date of Birth -->
      <div class="form-group">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($profile['dob']); ?>"  aria-describedby="dobHelp">
      </div>

      <!-- Mobile Number -->
      <div class="form-group">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="mobile" name="mobile"  aria-describedby="mobileHelp"  value="<?php echo htmlspecialchars($profile['mobile']); ?>">
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email"  value="<?php echo htmlspecialchars($profile['email']); ?>"   aria-describedby="emailHelp">
      </div>

      <!-- Gender -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Gender</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male"
             <?php if ($profile['gender'] == 'Male') echo 'checked'; ?> >
            <label class="form-check-label" for="gender_male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female"
            <?php if ($profile['gender'] == 'Female') echo 'checked'; ?> >
            <label class="form-check-label" for="gender_female">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_other" value="Other" 
             <?php if ($profile['gender'] == 'Other') echo 'checked'; ?> >
            <label class="form-check-label" for="gender_other">Other</label>
          </div>
        </div>
      </fieldset>

      <!-- Siblings -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Siblings</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Siblings" id="has_siblings_yes" value="yes" 
             <?php if (strtolower($profile['has_siblings']) == 'yes') echo 'checked'; ?>>
            <label class="form-check-label" for="has_siblings_yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Siblings" id="has_siblings_no" value="no" 
            <?php if (strtolower($profile['has_siblings']) == 'no') echo 'checked'; ?>>
            <label class="form-check-label" for="has_siblings_yes">No</label>
          </div>         
        </div>
      </fieldset>

      <!-- City -->
      <div class="form-group">
        <label for="livesin" class="form-label">Lives in</label>
        <input type="text" placeholder="Kolkata" class="form-control" id="lives_in" name="lives_in" value="<?php echo htmlspecialchars($profile['lives_in']); ?>"  aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="hometown" class="form-label">Home town</label>
        <input type="text" placeholder="Malda" class="form-control" id="hometown" name="hometown" value="<?php echo htmlspecialchars($profile['hometown']); ?>"  aria-describedby="nameHelp">
      </div>

       <div class="form-group">
        <label for="district" class="form-label">District</label>
        <input type="text" placeholder="Hooghly" class="form-control" id="dist" name="dist" value="<?php echo htmlspecialchars($profile['district']); ?>"  aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="state" class="form-label">State</label>
        <input type="text" placeholder="West Bengal" class="form-control" id="state" name="state"  value="<?php echo htmlspecialchars($profile['state']); ?>" aria-describedby="nameHelp">
      </div>

      

      <!-- Religion -->
      <div class="form-group">
        <label for="religion" class="form-label">Religion</label>
        <select class="form-control" id="religion" name="religion"  aria-describedby="religionHelp">
          <option value="">Select a religion</option>
          <option value="hindu" <?php if ($profile['religion'] == 'hindu') echo 'selected'; ?>>Hindu</option>
          <option value="muslim"<?php if ($profile['religion'] == 'muslim') echo 'selected'; ?>>Muslim</option>
          <option value="christian"<?php if ($profile['religion'] == 'christian') echo 'selected'; ?>>Christian</option>
          <!-- Add more religions here -->
        </select>
      </div>

       <div class="form-group">
        <label for="mothertounge" class="form-label">Mother tounge</label>
        <input type="text" placeholder="Bengali" class="form-control" id="mothertounge" name="mothertounge"  value="<?php echo htmlspecialchars($profile['mother_tongue']); ?>"  aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="height" class="form-label">Height</label>
        <input type="text" placeholder="5.7" class="form-control" id="height" name="height"  value="<?php echo htmlspecialchars($profile['height']); ?>"  aria-describedby="nameHelp">
      </div>

      <div class="form-group">
        <label for="weight" class="form-label">Weight</label>
        <input type="text" placeholder="67" class="form-control" id="weight" name="weight"  value="<?php echo htmlspecialchars($profile['weight']); ?>"  aria-describedby="nameHelp">
      </div>


       <!-- skin tone -->
      <fieldset class="form-group">
        <legend class="col-form-label pt-0">Skin tone</legend>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="fair" 
             <?php if(strtolower($profile['skin_tone']) == 'fair') echo 'checked'; ?>>
            <label class="form-check-label" for="fair">Fair</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="black" 
            <?php if (strtolower($profile['skin_tone'])== 'black') echo 'checked'; ?>>
            <label class="form-check-label" for="black">Black</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="skintone" id="" value="brown"
            <?php if (strtolower($profile['skin_tone'] == 'brown')) echo 'checked'; ?> >
            <label class="form-check-label" for="brown">Brown</label>
          </div>
        </div>
      </fieldset>

      <div class="form-group">
        <label for="height" class="form-label">Heighest level of education</label>
        <input type="text" placeholder="Engineering" class="form-control" id="edu" name="edu"
        value="<?php echo htmlspecialchars($profile['education_level']); ?>"  aria-describedby="nameHelp">
      </div>

       <div class="form-group">
        <label for="occu" class="form-label">Occupation</label>
        <input type="text" placeholder="Software Engineer" class="form-control" id="occu" name="occu"
        value="<?php echo htmlspecialchars($profile['occupation']); ?>"  aria-describedby="nameHelp">
      </div>
     
       <div class="form-group">
        <label for="about" class="form-label">About me</label>
         <textarea name="story" id="myTextArea" cols="90" rows="5" class="form-control"
           placeholder="Write about the bride or groom" style="padding: 10px 20px; border-radius: 8px; " ><?php echo htmlspecialchars($profile['about_me']); ?></textarea>

      </div>

      
            

      

     

      <div class="form-group col-12">
        <label for="images" class="form-label">Upload other pictures here</label>
        <div class="row">
        <input type="file" class="mb-2"  id="name" name="image1"  aria-describedby="nameHelp">
        <img src="<?php echo $profile['other_picture1']; ?>" width="150" alt="Picture-1">
        <input type="file" class="mb-2"   id="name" name="image2"  aria-describedby="nameHelp">
        <img src="<?php echo $profile['other_picture2']; ?>" width="150" alt="Picture-2">
        <input type="file"  id="name" name="image3"  aria-describedby="nameHelp">
        <img src="<?php echo $profile['other_picture3']; ?>" width="150" alt="Picture-3">
        <input type="file"  id="name" name="image4"  aria-describedby="nameHelp">
        <img src="<?php echo $profile['other_picture4']; ?>" width="150" alt="Picture-4">



        </div>
      </div>


      <!-- father Name -->
      <div class="form-group">
        <label for="fname" class="form-label">Father's name</label>
        <input type="text" class="form-control" placeholder="Ranjit Roy" id="fname" name="fname"
        value="<?php echo htmlspecialchars($profile['father_name']); ?>"  aria-describedby="nameHelp">
      </div>

      <!-- father occupation -->
      <div class="form-group">
        <label for="foccupation" class="form-label">Father's occupation</label>
        <input type="text" class="form-control" placeholder="Jobs" id="foccu" name="foccu"
        value="<?php echo htmlspecialchars($profile['father_occupation']); ?>"  aria-describedby="nameHelp">
      </div>

       <!-- mother Name -->
      <div class="form-group">
        <label for="mname" class="form-label">Mothers's name</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($profile['mother_name']); ?>" id="mname" name="mname" 
        aria-describedby="nameHelp">
      </div>

        <!-- mothers occupation -->
      <div class="form-group">
        <label for="moccupation" class="form-label">Mother's occupation</label>
        <input type="text" class="form-control"  id="moccu" name="moccu"
        value="<?php echo htmlspecialchars($profile['mother_occupation']); ?>"  aria-describedby="nameHelp">
      </div>


      <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Edit Profile</button>

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
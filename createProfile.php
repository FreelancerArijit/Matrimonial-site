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
    <?php include_once('components/header.php'); ?>

    <div class="card p-3 m-auto mt-5" style="max-width: 800px;">
  <div class="card-header">
    <h3 class="text-center"> Create Profile</h3>
  </div>
  <div class="card-body pb-3">

    <form method="POST" novalidate>

     <div class="form-group col-6">
        <label for="images" class="form-label">Upload your profile picture here</label>
        <input type="file"  id="name" name="profile-image" required aria-describedby="nameHelp">
      </div>

       <fieldset class="form-group">    
        <legend class="col-form-label pt-0">Create profile as</legend>   
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="bride" value="bride" required>
            <label class="form-check-label" for="bride">Bride</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="reg-for" id="groom" value="groom" required>
            <label class="form-check-label" for="groom">groom</label>
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
        <input type="number" placeholder="5.7" class="form-control" id="height" name="height" required aria-describedby="nameHelp">
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
        <input type="file" class="mb-2"  id="name" name="image1" required aria-describedby="nameHelp">
        <input type="file" class="mb-2"   id="name" name="image2" required aria-describedby="nameHelp">
        <input type="file"  id="name" name="image3" required aria-describedby="nameHelp">
        <input type="file"  id="name" name="image4" required aria-describedby="nameHelp">



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
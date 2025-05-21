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
    <h3 class="text-center"> Register</h3>
  </div>
  <div class="card-body pb-3">

    <form method="POST" novalidate>

     <div class="form-group col-6">
        <label for="images" class="form-label">Upload your profile picture here</label>
        <input type="file"  id="name" name="profile-image" required aria-describedby="nameHelp">
      </div>

       <fieldset class="form-group">    
        <legend class="col-form-label pt-0">Registration for</legend>   
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
        <input type="text" class="form-control" id="name" name="name" required aria-describedby="nameHelp">
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

      <!-- Country -->
      <div class="form-group">
        <label for="city" class="form-label">City</label>
        <select class="form-control" id="city" name="city" required aria-describedby="countryHelp">
          <option value="">Select a city</option>
          <option value="kolkata">Kolkata</option>
          <option value="delhi">Delhi</option>
          <option value="mumbai">Mumbai</option>
          <option value="bangalore">Bangalore</option>
          <option value="hydrabad">Hydrabad</option>
          <option value="chennai">Chennai</option>
          <option value="pune">Pune</option>
          <option value="gujrat">Gujrat</option>
          <option value="jaipur">Jaipur</option>
          <!-- Add more countries here -->
        </select>
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

      <!-- Username -->
      <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required aria-describedby="usernameHelp">
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required aria-describedby="emailHelp">
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required aria-describedby="passwordHelp">
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required aria-describedby="confirmPasswordHelp">
      </div>

      <button type="submit" class="btn btn-primary btn-block">Create Account</button>

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
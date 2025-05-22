<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="./css/custom.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
<title>ShadiWadi.com</title>
</head>
<body>
    <?php include_once('components/header.php'); ?>

    
    <div class="container-fluid d-flex   py-3">     
      <div class="col-8  p-3">
        <!-- Profile section -->
      <div class="col-6 py-2 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5); max-width: 800px;">
        <h4>Profile</h4>
        <div class="row p-3">
        <div class="col-12 col-sm-6 col-md-4">
  <img src="./images/profile.jpg" alt="Profile" class="img-fluid rounded-lg">
</div>
        <div class="col-7 mx-4">        
          <h4>Ronit Roy</h4>
          <p><i class="bi bi-geo-alt"></i>Kolkata, West Bengal | Age: 26</p>    
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, totam.</p>
          
               
        </div>
        </div>
      </div>
      <!-- Photos section -->
      <div class="col-6 py-3 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5); max-width: 800px;">
        <h4>Photos</h4>
        <ul class="list-unstyled d-flex flex-wrap justify-content-between p-3">
          <li><img src="./images/profile1.jpg" class="img-fluid" style="max-width: 150px;" alt=""></li>
          <li><img src="./images/profile2.jpg" class="img-fluid" style="max-width: 150px;"   alt=""></li>
          <li><img src="./images/profile3.jpg" class="img-fluid" style="max-width: 150px;"  alt=""></li>
          <li><img src="./images/profile4.jpg" class="img-fluid" style="max-width: 150px;" alt=""></li>
        </ul>
      </div>

      <!-- About section -->
      <div class="col-6 py-3 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);  max-width: 800px;">
        <h4>About</h4>
        <div class="d-flex justify-content-between flex-wrap" style="font-size: 18px;">
        <div class="col4 p-3">
          <ul class="list-unstyled">
            <li>Live in: <span> Kolkata </span></li>
            <li>Home town: <span> Malda </span></li>
            <li>Occupation: <span> IT Job </span></li>
            <li>Education: <span> B.Tech in CSE </span></li>
            <li>Height: <span>5.7</span> inch</li>

          </ul>
        </div>
        <div class="col4 p-3">
           <ul class="list-unstyled">
            <li>DOB: <span> 19/05/1999 </span></li>
            <li>Mobile no: <span> +91 9985478952 </span></li>
            <li>E-mail: <span> ronit@gmail.com </span></li>
            <li>Religion <span> Hinduism </span></li>
            <li>Weight: <span>67</span> kg</li>

          </ul>
        </div>
        </div>
        
      </div>   
      
      <div class="row mt-4">

      <a href="editProfile.php" class="btn btn-primary mr-4" style="background-color: #c00745; border: none;">Edit profile</a>
      <button type="submit" class="btn btn-primary  btn-block" style="width: 100px;">Logout</button>

      </div>

    </div> 

    <div class="col-4 rounded-lg p-3" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);">
      <h4>Recommandation</h4>

      
      <div class="recommendation-card p-3 border-bottom"  style="border-color:rgb(189, 190, 190);">
        <img src="./images/profile1.jpg" class="profile-img img-fluid  my-2" style="max-width: 150px;" alt="Profile Picture">
        <div class="user-info">
          <h5><i class="fas fa-user mr-2"></i>Priya Sharma</h5>
          <p>Age: 27 | Delhi</p>
          <p>Software engineer who loves traveling and reading. Looking for a kind and supportive partner.</p>
        </div>
      </div>

      <div class="recommendation-card p-3 border-bottom"  style="border-color:rgb(189, 190, 190);">
        <img src="https://via.placeholder.com/300x250" class="profile-img img-fluid w-25 my-2" alt="Profile Picture">
        <div class="user-info">
          <h5><i class="fas fa-user mr-2"></i>Priya Sharma</h5>
          <p>Age: 27 | Delhi</p>
          <p>Software engineer who loves traveling and reading. Looking for a kind and supportive partner.</p>
        </div>
      </div>

      <div class="recommendation-card p-3 border-bottom"  style="border-color:rgb(189, 190, 190);">
        <img src="https://via.placeholder.com/300x250" class="profile-img img-fluid w-25 my-2" alt="Profile Picture">
        <div class="user-info">
          <h5><i class="fas fa-user mr-2"></i>Priya Sharma</h5>
          <p>Age: 27 | Delhi</p>
          <p>Software engineer who loves traveling and reading. Looking for a kind and supportive partner.</p>
        </div>
      </div>

      
   

    </div>

    
    
    </div>


  

   
  
<div class="container-fluid mt-auto position-relative" style="top: 10%; background-color: #c00745; ">


<?php include_once('components/footer.php'); ?>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>
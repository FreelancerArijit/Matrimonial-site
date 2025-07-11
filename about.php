<?php require('config.php'); ?>
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
  <!-- Outer full-width container -->
  <div class="container-fluid py-2 mt-0">
   
  <!-- Inner box with border and padding -->
   <div class="container border rounded p-4">
      
      <div class="row">

        <div class="col-md-7 border border-white rounded p-4">
          <h2 class="text-body">About Us</h2>
          <p>ShadiWadi isn’t just a matrimonial site. It’s your trusted companion in one of life’s most important journeys — finding the one.
             In a world full of dating apps and casual chats, we’re bringing the focus back to what truly matters: meaningful connections, lasting compatibility, and family values. Whether you’re traditional at heart or modern in mindset, ShadiWadi helps you find your life partner with clarity, comfort, and confidence. </p>
         
          <!-- Read More Button -->
           <div class="btn" style="background-color: #c00745;"> 
          <a href="blog.php" style="color:white"> Know More </a> 
          </div>
        </div>

        <!-- Right column: image -->
        <div class="col-md-4 offset-md-1 border border-white rounded p-4">
          <img src="images/aboutimg.JPG" class="img-fluid" alt="About Us Image" style="max-height:400px; width: auto; height: auto; object-fit: contain;">
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
<?php require('config.php');?>
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



          <div class="container">

    <!-- Login container -->
<div class="container-fluid" id="forgot-pass-container" 
    style="
        max-width: 410px;
        width: 90%;
        padding: 15px;       
        background-color: white;
        margin-top: 10px;       
        border-radius: 10px;
    ">
     <div class="login-container">
            <h6 class="text-center mb-3">Already a user? Please Login</h6>

            <form method="POST" action="login.php">
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email ID" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>

                <button id= "user-login" type="submit" class="btn btn-block text-white" style="background-color: #c00745; border: none;">Login</button>

                <hr>

                <p class="text-center mt-3 mb-1">New to ShadiWadi? <a href="registration.php">Create an account</a></p>
               <!-- <p class="text-center"><a href="forgotPassword.php">Forgot Password?</a></p>-->
                <p class="text-center"><a href="adminLogin.php">Log in as admin</a></p>

            </form>
        </div>
    </div>
</div>

  
   

<div class="container-fluid mt-auto position-relative" style="background-color: #c00745; top: 19%; ">


<?php include_once('components/footer.php'); ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
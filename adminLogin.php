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
    <div class="card border-0 shadow-sm p-4" style="background-color: white;">
        <h3 class="text-center mb-4">Login as admin</h3>

        <div class="login-container">         

            <form method="POST" action="#">

            <div class="form-group">
                    <label for="password">Enter email id</label>
                    <input type="email" class="form-control" id="email" name="email_id" placeholder="Enter email id" required>
                </div>              

                <div class="form-group">
                    <label for="password">Enter Password</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Enter new password again" required>
                </div>

                <button id= "user-login" type="submit" class="btn btn-block text-white" style="background-color: #c00745; border: none;">Login as admin</button>

               

                

            </form>
        </div>
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
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

    <div class="container py-5 flex-fill">
        <div class="col">

            <div class="col-4 m-auto text-center py-4 rounded-lg" style="min-height: 150px; min-width: 240px; background-color: whitesmoke ">
            <label for="image">Upload your image</label>
            <input type="file" name="img" id="" >
            </div>

             <div class="col-4 m-auto text-center py-4 rounded-lg" style=" display: flex; flex-direction: column; max-width: 1100px; background-color: whitesmoke ">
           <input type="text" name="title" id="" placeholder="Write story title" style="max-width: 1068px; padding: 10px 20px; border-radius: 8px; border: none;">
           <textarea name="story" id="" cols="30" rows="10" placeholder="Write your story" style="padding: 10px 20px; border-radius: 8px; border: none"></textarea>
            </div>

        </div>
  
  
</div>

<div class="container-fluid mt-auto position-relative" style="background-color: #c00745; top: 10%; ">


<?php include_once('components/footer.php'); ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
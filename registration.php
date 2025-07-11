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

// BackEnd Logic 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name=$_POST['name'];
$mobile=$_POST['mobile'] ;
$email    = $_POST['email'] ;
$password = $_POST['password'] ;

//  Validate email format
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='text-danger text-center'>Something Went Wrong ! Please try again.....</p>";
        echo '<meta http-equiv="refresh" content="3;url=index.php">';
        exit;
    }
  
//Check if the email is already exists in database or not 
$checkQuery = "SELECT * FROM Customers WHERE email='$email'";
$result = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($result) > 0) {
     echo "<p class='text-success text-center'>Email or UserName already exists! Redirecting to Login Page...</p>";
     echo '<meta http-equiv="refresh" content="3;url=userLogin.php">';
     exit;
    
}

// Password Encryption & Insert user data onto table Customers
$hashedPassword= password_hash($password, PASSWORD_DEFAULT);
$sql= "INSERT INTO Customers
(name,mobile,email,password)
VALUES
('$name', '$mobile', '$email', '$hashedPassword')";

$rec=mysqli_query($conn,$sql);
if ($rec) {
    echo "<p class='text-success text-center'>Account created successfully! Redirecting to Login Page...</p>";
    // After 3 second page redirecting to createProfile.php
    echo '<meta http-equiv="refresh" content="1;url=userLogin.php">';
    exit;
} else {
    echo "<p class='text-danger text-center'>Error creating account. Please try again.</p>";
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
    exit;
}
}
    ?>


    <div class="card p-3 m-auto mt-5" style="max-width: 800px;">
  <div class="card-header">
    <h3 class="text-center"> Create Account</h3>
  </div>
  <div class="card-body pb-3">

    <form method="POST" novalidate>  

       


      <!-- Name -->
      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Ronit Roy" id="name" name="name" required aria-describedby="nameHelp" required>
      </div>


      <!-- Mobile Number -->
      <div class="form-group">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" pattern="[0-9]{10}" id="mobile" name="mobile" required aria-describedby="mobileHelp" placeholder="7865095896" required>
      </div>      
      
     

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="xyz@gmail.com" id="email" name="email" required aria-describedby="emailHelp" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required aria-describedby="passwordHelp" required>
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

<script>
  const name = document.querySelector("#name");
  const mobile = document.querySelector("#mobile");
  const email = document.querySelector("#email");

  //validate the name
  name.addEventListener("blur", function(){

  if (name.value.trim() === "") return; 
    if(!isNaN(name.value)){
      alert("Please enter a valid name (letters only)");
      name.value= "";
    }
  })

  //validate the mobile number
mobile.addEventListener("blur", function() {

  if (mobile.value.trim() === "") return; 

  if(mobile.value.length > 10 || mobile.value.length < 10){
    alert("Please enter a valid mobile number (10 digits only)");
    mobile.value = "";
  }
})

//validate email format
email.addEventListener("blur", function() {
  if(email.value.trim() === "") return;

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if(!emailPattern.test(email.value)){
    alert("Please enter a valid email address");
    email.value = "";
  }
})




  </script>
</body>
</html>
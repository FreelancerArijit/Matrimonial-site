<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/custom.css">  
  <title>ShadiWadi Dropdown</title>
</head>
<body> 
  <div class="container-fluid" id="header-navbar">
    <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark p-3">
      <a class="navbar-brand h1 mb-0" href="index.php">ShadiWadi.com</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="menu-items">
          <li class="nav-item">
            <a class="nav-link" href="./about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contact Us</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="./price.php">Pricing</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="./blog.php">Stories</a>
          </li>
          
        </ul>

        <!-- <form class="form-inline my-2 my-lg-0 d-none w-100" id="search-form">
          <input class="form-control w-100" type="search" placeholder="Search" aria-label="Search">
        </form> -->

        <button class="btn btn-outline-light my-2 mx-2 my-sm-0 " id="search-btn" type="button">
          Search           
        </button>
        <button class="btn btn-outline-light my-2 mx-2 my-sm-0 " id="login-btn" type="button">
          Login           
        </button>
        <div class="user-badge" style="display: none;">
         <a href="./profile.php"> <img src="./images/user.png" alt="user" class="user-icon" style="height: 40px; width: 40px;"> </a>
        </div>
      </div>
    </nav>   
  </div>
<!-- search nav bar -->
  <div class="container-fluid" id="search-bar" style="display: none; background-color: #c00745;;">
  <div class="p-3" >
    <div class="row">      
      <div class="col-md-2 mb-2">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-expanded="false">
            I'm looking for
          </button>
          <div class="dropdown-menu w-100">
            <a class="dropdown-item" href="#">Groom</a>
            <a class="dropdown-item" href="#">Bride</a>
          </div>
        </div>
      </div>

     
      <div class="col-md-2 mb-2">
        <input type="number" class="form-control" placeholder="Age From" min="18" max="100">
      </div>

      
      <div class="col-md-2 mb-2">
        <input type="number" class="form-control" placeholder="Age To" min="18" max="100">
      </div>

      
      <div class="col-md-2 mb-2">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-expanded="false">
            City
          </button>
          <div class="dropdown-menu w-100">
          <a class="dropdown-item" href="#">Kolkata</a>
              <a class="dropdown-item" href="#">Delhi</a>
              <a class="dropdown-item" href="#">Mumbai</a>
              <a class="dropdown-item" href="#">Bangalore</a>
              <a class="dropdown-item" href="#">Hydrabad</a>
              <a class="dropdown-item" href="#">Chennai</a>
              <a class="dropdown-item" href="#">Pune</a>
              <a class="dropdown-item" href="#">Gujrat</a>
              <a class="dropdown-item" href="#">Jaipur</a>
          </div>
        </div>
      </div>

     
      <div class="col-md-2 mb-2">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-expanded="false">
            Religion
          </button>
          <div class="dropdown-menu w-100">
            <a class="dropdown-item" href="#">Hindu</a>
            <a class="dropdown-item" href="#">Muslim</a>
            <a class="dropdown-item" href="#">Christian</a>
          </div>
        </div>
      </div>

      <div class="col-md-2 mb-2"> 
        <button class="btn btn-outline-light my-2 mx-2 my-sm-0 " id="expanded-search-btn" type="button">
          Search           
        </button>
    </div>
     

    </div>
  </div>
</div>

<!-- Login container -->
<div class="container-fluid" id="login-container" 
    style="
        max-width: 410px;
        width: 90%;
        padding: 15px;
        position: absolute;
        right: 10px;
        top: 15%;
        z-index: 1050;
        background-color: #fbe9ef;
        display: none;
        border-radius: 10px;
    ">
    <div class="card border-0 shadow-sm p-4" style="background-color: #fbe9ef;">
        <h3 class="text-center mb-4">Login</h3>

        <div class="login-container">
            <h6 class="text-center mb-3">Already a user? Please Login</h6>

            <form method="POST" action="#">
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Mobile no. / Email ID" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>

                <button id= "user-login" type="submit" class="btn btn-block text-white" style="background-color: #c00745; border: none;">Login</button>

                <hr>

                <p class="text-center mt-3 mb-1">New to ShadiWadi? <a href="./registration.php">Create an account</a></p>
                <p class="text-center"><a href="forgotPassword.php">Forgot Password?</a></p>
                <p class="text-center"><a href="adminLogin.php">Log in as admin</a></p>

            </form>
        </div>
    </div>
</div>


 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="./js/custom.js"></script>
 
</body>
</html>


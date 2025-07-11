<?php
require('config.php');
$profile_created = 0;
$preference_created = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT profile_created, preference_created FROM customers WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile_created = $row['profile_created'];
        $preference_created = $row['preference_created'];
    }
}
?>
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
  
<script>
  function checkProfileCreated() {
    var profileCreated = <?php echo ($profile_created == 1) ? 'true' : 'false'; ?>;
    var preferenceCreated = <?php echo ($preference_created == 1) ? 'true' : 'false'; ?>;

    if (!profileCreated) {
      alert("You haven't created your profile yet. Please complete it first!");
      window.location.href = './createProfile.php';
    } else if (!preferenceCreated) {
      alert("You haven't added your preferences yet. Please complete that step.");
      window.location.href = './addPreference.php';
    } else {
      window.location.href = './profile.php';
    }
  }
</script>


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

       <?php if (isset($_SESSION['user_id'])): ?>
  <!-- Dropdown when user is logged in -->
  <div class="dropdown">
    <button class="btn btn-outline-light dropdown-toggle my-2 mx-2 my-sm-0" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Profile
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a href="#" class="dropdown-item" onclick="checkProfileCreated()">My Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="./logout.php">Logout</a>
    </div>
  </div>
 
      <?php else: ?>
        <!-- If user is not logged in -->
        </button>
        <a href="./userLogin.php"><button class="btn btn-outline-light my-2 mx-2 my-sm-0 " id="login-btn" type="button">
          Login           
        </button> </a>
        <?php endif; ?>
    </nav>   
  </div> 
<!-- search nav bar -->
 <div class="container-fluid" id="search-bar" style="display: none; background-color: #c00745;">
  <form method="GET" action="searchResults.php" class="p-3">
    <div class="row">
      <!-- I'm looking for -->
      <div class="col-md-2 mb-2">
        <select class="form-control" name="looking_for" required>
          <option value="">I'm looking for</option>
          <option value="groom">Groom</option>
          <option value="bride">Bride</option>
        </select>
      </div>

      <!-- Age From -->
      <div class="col-md-2 mb-2">
        <input type="number" class="form-control" name="age_from" placeholder="Age From" min="18" max="100" required>
      </div>

      <!-- Age To -->
      <div class="col-md-2 mb-2">
        <input type="number" class="form-control" name="age_to" placeholder="Age To" min="18" max="100" required>
      </div>

      <!-- City -->
      <div class="col-md-2 mb-2">
        <select class="form-control" name="city">
          <option value="">City</option>
          <option value="Kolkata">Kolkata</option>
          <option value="Delhi">Delhi</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Bangalore">Bangalore</option>
          <option value="Hyderabad">Hyderabad</option>
          <option value="Chennai">Chennai</option>
          <option value="Pune">Pune</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Jaipur">Jaipur</option>
        </select>
      </div>

      <!-- Religion -->
      <div class="col-md-2 mb-2">
        <select class="form-control" name="religion">
          <option value="">Religion</option>
          <option value="Hindu">Hindu</option>
          <option value="Muslim">Muslim</option>
          <option value="Christian">Christian</option>
        </select>
      </div>

      <!-- Search Button -->
      <div class="col-md-2 mb-2">
        <button type="submit" class="btn btn-outline-light w-100">Search</button>
      </div>
    </div>
  </form>
</div>

 


 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="./js/custom.js"></script>
 
</body>
</html>


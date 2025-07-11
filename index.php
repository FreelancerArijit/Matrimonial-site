<?php require('config.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
    <title>ShadiWadi.com</title>
  </head>
  <body> 
  

  <?php include_once('components/header.php'); ?>

    <div class="container-fluid" id="slider-container">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/banner1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption w-50 d-none d-md-block">
        <h5>Find Your Perfect Match, Made in Heaven.</h5>
        <p>Join thousands of Indian singles discovering love and togetherness today.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/banner2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption w-50 d-none d-md-block">
        <h5>Your Journey to a Lifetime of Happiness Begins Here.</h5>
        <p>Start meeting genuine, verified profiles tailored to your dreams.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/banner4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption w-50 d-none d-md-block">
        <h5>Where Tradition Meets Modern Love.</h5>
        <p>Create your story with trusted matches from your community and beyond.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>        
    </div>

    <div class="jumbotron jumbotron-fluid p-3 m-auto" id="process-container">
  <div class="container">
    <h4 class="display-5 text-center mb-4">Now finding someone is easy</h4>
    <div class="row justify-content-center">      
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
        <div class="card w-100">
          <img src="./images/icon3.png" class="card-img-top img-fluid w-25 mx-auto" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Create Your Profile</h5>
            <p class="card-text">Register and add details about yourself, your preferences, and your dreams</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
        <div class="card w-100">
        <img src="./images/icon2.png" class="card-img-top img-fluid w-25 mx-auto" alt="...">          
          <div class="card-body text-center">
            <h5 class="card-title">Browse and Connect</h5>
            <p class="card-text">Explore verified matches, express interest, and start meaningful conversations.</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
        <div class="card w-100">
        <img src="./images/icon1.png" class="card-img-top img-fluid w-25 mx-auto" alt="...">          
          <div class="card-body text-center">
            <h5 class="card-title">Meet and Celebrate</h5>
            <p class="card-text">Build trust, take the next step, and begin your beautiful journey together.</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="container-fluid p-3 m-auto justify-content-center align-items-center">
  <div class="container-fluid">
    <h3 class="text-center">Success stories</h3>
  </div>

  <div class="container-fluid p-3 m-auto row justify-content-center align-items-center">

    <?php
    $query = "SELECT * FROM story WHERE published = 1 ORDER BY creation_at DESC LIMIT 4";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $image = !empty($row['story_image']) ? htmlspecialchars($row['story_image']) : './images/default.jpg';
            $title = htmlspecialchars($row['story_title']);
            $desc = strip_tags($row['description']);
            $short_desc = mb_substr($desc, 0, 90) . (mb_strlen($desc) > 90 ? '...' : '');
            $story_id = intval($row['id']);
    ?>
    <div class="card m-3 hover-scale" style="width: 18rem; cursor: pointer;" id="cards-container">
      <img src="<?= $image ?>" class="card-img-top image-fluid w-100 mx-auto" style="height: 250px;" alt="Success Story">
      <div class="card-body">
        <h5 class="card-title"><?= $title ?></h5>
        <p class="card-text"><?= $short_desc ?></p>
        <a href="blog.php" class="btn btn-primary" style="background-color: #c00745; border: none;">View More</a>
      </div>
    </div>
    <?php
        }
    } else {
        echo '<div class="col-12"><p class="text-muted text-center">No published stories available yet.</p></div>';
    }
    ?>
  </div>
</div>
</div>


</div>

<?php include_once('components/footer.php'); ?>

  



<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/custom.js"></script>

</body>
</html>
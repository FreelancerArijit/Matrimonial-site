<?php require('config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit;
}

$profile_id = $_GET['id'] ?? null;
if (!$profile_id) {
    die("Profile ID not provided.");
}
$profile_sql = "SELECT * FROM user_profiles WHERE id = " . intval($profile_id);
$profile_result = mysqli_query($conn, $profile_sql);
if (!$profile_result || mysqli_num_rows($profile_result) == 0) {
    die("Profile not found.");
}
$profile = mysqli_fetch_assoc($profile_result);
// Fetch preferences
$pref_sql = "SELECT * FROM preferences WHERE cust_id = " . intval($profile['cust_id']);
$pref_result = mysqli_query($conn, $pref_sql);
$preference = mysqli_fetch_assoc($pref_result);

// Fetch user account info (email, mobile)
$user_sql = "SELECT * FROM customers WHERE id = " . intval($profile['cust_id']);
$user_result = mysqli_query($conn, $user_sql);
$user = mysqli_fetch_assoc($user_result);
?>


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
    <?php include_once('components/header.php');
 ?>

   <div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <!-- Profile Main Info -->
      <div class="card shadow mb-4">
        <div class="card-body row">
          <div class="col-md-4">
            <img src="<?= !empty($profile['profile_picture']) ? $profile['profile_picture'] : './images/default-profile.jpg'; ?>"
                 class="img-fluid rounded-lg w-100" alt="Profile Picture">
          </div>
          <div class="col-md-8">
            <h4><?= htmlspecialchars($profile['full_name']) ?></h4>
            <p><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($profile['hometown']) ?>, <?= htmlspecialchars($profile['district']) ?>, <?= htmlspecialchars($profile['state']) ?></p>
            <p><strong>Age:</strong> 
              <?php
                $dob = new DateTime($profile['dob']);
                $today = new DateTime();
                echo $today->diff($dob)->y;
              ?>
            </p>
            <p><?= nl2br(htmlspecialchars($profile['about_me'])) ?></p>
          </div>
        </div>
      </div>

      <!-- Other Photos -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <h5 class="mb-3">Other Photos</h5>
          <div class="d-flex flex-wrap gap-3">
            <?php
              $photos = [
                $profile['other_picture1'] ?? '',
                $profile['other_picture2'] ?? '',
                $profile['other_picture3'] ?? '',
                $profile['other_picture4'] ?? ''
              ];
              foreach ($photos as $pic) {
                if (!empty($pic)) {
                  echo '<img src="' . htmlspecialchars($pic) . '" class="img-fluid rounded mb-2 mr-2" style="max-width: 150px;" alt="Additional Photo">';
                }
              }
            ?>
          </div>
        </div>
      </div>

      <!-- Basic Details -->
      <div class="card shadow mb-4">
        <div class="card-body row">
          <div class="col-md-6">
            <h5>Basic Information</h5>
            <ul class="list-unstyled">
              <li><strong>Lives in:</strong> <?= htmlspecialchars($profile['lives_in']) ?></li>
              <li><strong>Hometown:</strong> <?= htmlspecialchars($profile['hometown']) ?></li>
              <li><strong>Occupation:</strong> <?= htmlspecialchars($profile['occupation']) ?></li>
              <li><strong>Education:</strong> <?= htmlspecialchars($profile['education_level']) ?></li>
              <li><strong>Height:</strong> <?= htmlspecialchars($profile['height']) ?> inch</li>
              <li><strong>Weight:</strong> <?= htmlspecialchars($profile['weight']) ?> kg</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5>Contact</h5>
            <ul class="list-unstyled">
              <li><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
              <li><strong>Mobile:</strong> <?= htmlspecialchars($user['mobile']) ?></li>
              <li><strong>Religion:</strong> <?= htmlspecialchars($profile['religion']) ?></li>
              <li><strong>Mother Tongue:</strong> <?= htmlspecialchars($profile['mother_tongue']) ?></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="card shadow mb-4">
        <div class="card-body row">
          <div class="col-md-6">
            <h5>Preferences</h5>
            <ul class="list-unstyled">
              <li><strong>Preferred Age:</strong> <?= htmlspecialchars($preference['preferred_age_min']) ?> - <?= htmlspecialchars($preference['preferred_age_max']) ?> years</li>
               <li><strong>Preferred Height:</strong> <?= htmlspecialchars($preference['preferred_height']) ?> inch</li>
        <li><strong>Preferred Weight:</strong> <?= htmlspecialchars($preference['preferred_weight']) ?> kg</li>
        <li><strong>Preferred Skin Tone:</strong> <?= htmlspecialchars($preference['preferred_skin_tone']) ?></li>
        <li><strong>Preferred Religion:</strong> <?= htmlspecialchars($preference['preferred_religion']) ?></li>
        <li><strong>Preferred Mother Tongue:</strong> <?= htmlspecialchars($preference['preferred_mother_tongue']) ?></li>
      </ul>
            </ul>
          </div>
          <div class="col-md-6">
            
            <ul class="list-unstyled">
              <li><strong>Preferred Education Level:</strong> <?= htmlspecialchars($preference['preferred_education_level'] ?? 'N/A') ?></li>
        <li><strong>Preferred Occupation:</strong> <?= htmlspecialchars($preference['preferred_occupation'] ?? 'N/A') ?></li>
        <li><strong>Preferred Lives In:</strong> <?= htmlspecialchars($preference['preferred_lives_in']) ?></li>
        
            </ul>
          </div>
        </div>
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
<?php require('config.php');
  if (!isset($_SESSION['user_id'])) {
    header("Location: userLogin.php");
    exit;
} ?>

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

  // Get user ID
  $userId = $_SESSION['user_id'];


// Fetch user from customers table
$userQuery = "SELECT * FROM customers WHERE id = $userId";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);

$profileQuery = "SELECT * FROM user_profiles WHERE cust_id = $userId";
$profileResult = mysqli_query($conn, $profileQuery);
$profile = mysqli_fetch_assoc($profileResult);
?>

    <div class="container-fluid d-flex justify-content-center align-items-center  py-3">
      <div class="col-8  p-3">
        <div class="col-6 py-2 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5); max-width: 800px;">
        <h4>Profile</h4>
        <div class="row p-3">
        <div class="col-12 col-sm-6 col-md-4">
  <img src="<?php echo $profile['profile_picture']??' ./images/default-profile.jpg';?>" alt="Profile" class="img-fluid rounded-lg">
</div>
        <div class="col-7 mx-4">
          <h4><?php echo htmlspecialchars($profile['full_name']); ?></h4>
          <p><i class="bi bi-geo-alt"></i>
          <?php echo htmlspecialchars($profile['hometown']); ?> ,
          <?php echo htmlspecialchars($profile['district']); ?> ,
          <?php echo htmlspecialchars($profile['state']); ?>
          | Age: <?php $dob = new DateTime($profile['dob']);
            $today = new DateTime();
            $age = $today->diff($dob)->y;
            echo $age;
            ?>
          <p><?php echo htmlspecialchars($profile['about_me']); ?></p>


        </div>
        </div>
      </div>
      <div class="col-6 py-3 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5); max-width: 800px;">
        <h4>Photos</h4>
        <ul class="list-unstyled d-flex flex-wrap justify-content-between p-3">
          <li><img src="<?php echo $profile['other_picture1'];?>" class="img-fluid" style="max-width: 150px;" alt=""></li>
          <li><img src="<?php echo $profile['other_picture2']??' ./images/default-profile.jpg';?>"class="img-fluid" style="max-width: 150px;"   alt=""></li>
          <li><img src="<?php echo $profile['other_picture3']??' ./images/default-profile.jpg';?>" style="max-width: 150px;"  alt=""></li>
          <li><img src="<?php echo $profile['other_picture4']??' ./images/default-profile.jpg';?>" class="img-fluid" style="max-width: 150px;" alt=""></li>
        </ul>
      </div>

      <div class="col-6 py-3 rounded-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);  max-width: 800px;">
        <h4>About</h4>
        <div class="d-flex justify-content-between flex-wrap" style="font-size: 18px;">
        <div class="col4 p-3">
          <ul class="list-unstyled">
            <li>Live in: <span><?php echo $profile['lives_in']; ?></span></li>
            <li>Home town: <span> <?php echo $profile['hometown']; ?> </span></li>
            <li>Occupation: <span> <?php echo $profile['occupation']; ?> </span></li>
            <li>Education: <span> <?php echo $profile['education_level']; ?> </span></li>
            <li>Height: <span><?php echo $profile['height']; ?></span> inch</li>
            <li>Father Name: <span><?php echo $profile['father_name']; ?></span></li>
            <li>Father Occupation: <span><?php echo $profile['father_occupation']; ?></span></li>


          </ul>
        </div>
        <div class="col4 p-3">
           <ul class="list-unstyled">
            <li>DOB: <span> <?php echo $profile['dob']; ?></span></li>
            <li>Mobile no: <span> +91 <?php echo $user['mobile']; ?></span></li>
            <li>E-mail: <span> <?php echo $user['email']; ?> </span></li>
            <li>Religion <span> <?php echo $profile['religion'];?> </span></li>
            <li>Weight: <span><?php echo $profile['weight']; ?></span> kg</li>
            <li>Mother Name: <span><?php echo $profile['mother_name']; ?></span></li>
            <li>Mother Occupation: <span><?php echo $profile['mother_occupation']; ?></span></li>

          </ul>
        </div>
        </div>

      </div>

      <div class="row mt-4 d-flex justify-content-end align-items-center" style="width: 800px;">

      <a href="editProfile.php" class="btn btn-primary mr-4" style="background-color: #c00745; border: none;">Edit profile</a>
      <a href="logout.php"><button type="submit" class="btn btn-primary  btn-block" style="width: 100px;">Logout</button> </a>

      </div>
    </div> </div> <?php
// Fetch preferences for current user
$preferenceQuery = "SELECT * FROM preferences WHERE cust_id = $userId LIMIT 1";
$preferenceResult = mysqli_query($conn, $preferenceQuery);
$preference = mysqli_fetch_assoc($preferenceResult);


if ($preference) {
    
    // Step 1: Get current user's profile type (Bride/Groom)
$profileQuery = "SELECT profile_for FROM user_profiles WHERE cust_id = $userId LIMIT 1";
$profileResult = mysqli_query($conn, $profileQuery);
$userProfile = mysqli_fetch_assoc($profileResult);

if ($userProfile) {
    $myProfileType = $userProfile['profile_for'];
    if ($myProfileType == 'Bride') {
        $targetProfile = 'Groom'; // If I am a Bride, I want a Groom
    } else { // This implies $myProfileType is 'Groom' (or anything else, but for enum, it's Groom)
        $targetProfile = 'Bride'; // If I am a Groom, I want a Bride
    }
} else {
 echo "<div class='container-fluid my-4 text-center'><p>Your profile is incomplete.</p></div>";
exit;
}


    $minAge = $preference['preferred_age_min'];
    $maxAge = $preference['preferred_age_max'];

    // Calculate birthdate range based on age
   $today = new DateTime();

// Calculate dobMax = today - minAge
$dobMax = (clone $today)->sub(new DateInterval("P{$minAge}Y"))->format('Y-m-d');

// Calculate dobMin = today - maxAge
$dobMin = (clone $today)->sub(new DateInterval("P{$maxAge}Y"))->format('Y-m-d');



    // Build query to fetch recommendations
    $recommendQuery = "
    SELECT * FROM user_profiles
    WHERE
        profile_for = '$targetProfile' AND
        dob BETWEEN '$dobMin' AND '$dobMax' AND
        cust_id != $userId
    ORDER BY RAND()
    LIMIT 5
";


    $recommendResult = mysqli_query($conn, $recommendQuery);

    // This section is now outside the previous container-fluid
    echo '<div class="container-fluid my-4">'; // Added a container-fluid for recommendations
    echo '<h3 class="text-center mb-4">Recommended Profiles</h3>'; // Added a heading for recommendations
    echo '<div class="row justify-content-center">'; // This row will contain your recommendation cards

    if (mysqli_num_rows($recommendResult) > 0) {
        while ($rec = mysqli_fetch_assoc($recommendResult)) {
            // Calculate age
            $dob = new DateTime($rec['dob']);
            $age = (new DateTime())->diff($dob)->y;

            echo '
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="recommendation-card p-3 w-100 border rounded shadow-sm text-center">
                    <img src="' . ($rec['profile_picture'] ?? './images/default-profile.jpg') . '" class="profile-img img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Profile Picture">
                    <div class="user-info">
                        <h5 class="mb-1"><i class="fas fa-user mr-2"></i>' . htmlspecialchars($rec['full_name']) . '</h5>
                        <p class="text-muted mb-1">Age: ' . $age . ' | ' . htmlspecialchars($rec['lives_in']) . '</p>
                        <p class="small text-secondary">' . htmlspecialchars(substr($rec['about_me'], 0, 80)) . '...</p>
                    </div>
                    <a href="profileDetails.php?id=' . $rec['cust_id'] . '" class="btn btn-sm btn-primary mt-2" style="background-color: #c00745; border: none;">View Profile</a>
                </div>
            </div>';
        }
    } else {
        echo "<div class='col-12 text-center'><p>No suitable matches found based on your preferences.</p></div>";
    }
    echo '</div>'; // Close the Bootstrap .row
    echo '</div>'; // Close the container-fluid for recommendations
} else {
    echo "<div class='container-fluid my-4 text-center'><p>Please set your preferences to see recommendations.</p></div>";
}
?>

<div class="container-fluid mt-auto" style="background-color: #c00745; ">
    <?php include_once('components/footer.php'); ?>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>
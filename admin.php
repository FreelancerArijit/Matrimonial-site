<?php
// Check if the admin is login or not 
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
?>

<?php
// display the number of total register user in dynamically in card in admin dashboard
$customer_count = 0;
$sql = "SELECT COUNT(*) AS total FROM customers";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $customer_count = $row['total'];
}
?>

<?php
// Display the No. of Groom & Bride Profiles Dynamically in card in admin dashboard
$bride_count = 0;
$groom_count = 0;

$sql_bride = "SELECT COUNT(*) AS total FROM user_profiles WHERE profile_for = 'Bride'";
$sql_groom = "SELECT COUNT(*) AS total FROM user_profiles WHERE profile_for = 'Groom'";
$result="SELECT COUNT(*) AS total FROM user_profiles";



$result_bride = mysqli_query($conn, $sql_bride);
$result_groom = mysqli_query($conn, $sql_groom);
$result_total=mysqli_query($conn,$result);

if ($result_bride) {
    $row = mysqli_fetch_assoc($result_bride);
    $bride_count = $row['total'];
}

if ($result_groom) {
    $row = mysqli_fetch_assoc($result_groom);
    $groom_count = $row['total'];
}
if ($result_total && mysqli_num_rows($result_total) > 0) {
    $row = mysqli_fetch_assoc($result_total);
    $profile_count = $row['total'];
}
?>

<?php
// Display The no. of people shared their sucess story in the card admin dashboard
$story_count = 0;
$sql_story = "SELECT COUNT(*) AS total FROM story";
$result_story = mysqli_query($conn, $sql_story);
if ($result_story && mysqli_num_rows($result_story) > 0) {
    $row = mysqli_fetch_assoc($result_story);
    $story_count = $row['total'];
}
?>

<?php
// Display the no. of contact us staus pending list dyanmically in the card in admin dashboard
$query3 = "SELECT COUNT(*) AS total FROM contacts WHERE status = 'pending'";
$result2 = mysqli_query($conn, $query3);
$result_contact = mysqli_fetch_assoc($result2);
$totalContacts = $result_contact['total'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashborad Admin</title>       
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="./css/custom.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require('./components/menu.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>                       
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            
                        </ol>
                        

                        <!-- TOTAL NUMBER OF REGISTRATION CARDS-->
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
    <div class="card text-white mb-4 shadow" style="background: linear-gradient(135deg, #007bff, #0056b3); transition: transform 0.3s;">
        <div class="card-body text-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="badge badge-light text-primary px-3 py-2" style="font-size: 0.9rem; border-radius: 30px; font-weight: bold;">
                    <i class="fas fa-chart-line mr-2"></i> Customer Count
                </div>
                <i class="fas fa-users fa-2x"></i>
            </div>
            <h1 class="font-weight-bold mt-3 mb-0" style="font-size: 2.5rem;"><?php echo $customer_count; ?></h1>
            <p class="text-white-50 mb-0">Total Registered Users</p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top border-light">
            <a class="small text-white stretched-link" href="CustomerList.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

            <!-- BRIDE AND GROOM CARD -->

                  <div class="col-xl-3 col-md-6">
    <div class="card text-white mb-4 shadow" style="background: linear-gradient(135deg, #28a745, #1e7e34); transition: transform 0.3s;">
        <div class="card-body text-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="badge badge-light text-success px-3 py-2" style="font-size: 0.9rem; border-radius: 30px; font-weight: bold;">
                    <i class="fas fa-heart mr-2"></i> Matrimony Profiles
                </div>
                <i class="fas fa-ring fa-2x"></i>
            </div>
            <h5 class="mt-3 mb-1" style="font-size: 1.2rem;">👰 Brides: <strong><?php echo $bride_count; ?></strong></h5>
            <h5 class="mb-0" style="font-size: 1.2rem;">🤵 Grooms: <strong><?php echo $groom_count; ?></strong></h5>
            <p class="text-white font-weight-bold mb-0 h5">
  Total Matrimony Users: <?php echo $profile_count; ?>
</p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top border-light">
            <a class="small text-white stretched-link" href="MatrimonialList.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

            <!-- SUCESS STORIES CARD-->
                       <div class="col-xl-3 col-md-6">
    <div class="card text-white mb-4 shadow" style="background: linear-gradient(135deg, #00c6ff, #0072ff); transition: transform 0.3s;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="badge badge-light text-primary px-3 py-2" style="font-size: 0.9rem; border-radius: 30px; font-weight: bold;">
                    <i class="fas fa-heart mr-2"></i> Stories
                </div>
                <i class="fas fa-book-open fa-2x"></i>
            </div>
            <h1 class="font-weight-bold mt-3 mb-0" style="font-size: 2.5rem;"><?php echo $story_count; ?></h1>
            <p class="text-white-50 mb-0">Total Success Stories</p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top border-light">
            <a class="small text-white stretched-link" href="StoryList.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

   
                            <div class="col-xl-3 col-md-6">
    <div class="card text-white mb-4 shadow" style="background: linear-gradient(135deg, #11998e, #38ef7d); transition: transform 0.3s;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="badge badge-light text-success px-3 py-2" style="font-size: 0.9rem; border-radius: 30px; font-weight: bold;">
                    <i class="fas fa-envelope-open-text mr-2"></i> Contact Summary
                </div>
                <i class="fas fa-headset fa-2x"></i>
            </div>
            <h1 class="font-weight-bold mt-3 mb-0" style="font-size: 2.5rem;"><?php echo $totalContacts; ?></h1>
            <p class="text-white-50 mb-0">Total Pending Contact Queries</p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between bg-transparent border-top border-light">
            <a class="small text-white stretched-link" href="view_contact.php">View Details</a>
            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>


                </main>
               
            </div>
        </div>
</div>

        <div class="container-fluid mt-auto position-relative" style="top: 30%; background-color: #c00745; ">


<?php include_once('components/footer.php'); ?>

</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    </body>
</html>

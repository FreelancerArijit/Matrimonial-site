<?php
require('config.php');
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<h5 class='text-center mt-5'>Invalid profile ID.</h5>";
    exit;
}
$profileId = intval($_GET['id']);

$query = "SELECT * FROM user_profiles WHERE cust_id = $profileId LIMIT 1";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<h5 class='text-center mt-5'>Profile not found.</h5>";
    exit;
}
$profile = mysqli_fetch_assoc($result);
// Calculate age
$dob = new DateTime($profile['dob']);
$age = (new DateTime())->diff($dob)->y;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($profile['full_name']); ?> | Profile Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="icon" href="images/favicon.jpg" sizes="20x20" type="image/png">
</head>
<body>
<?php include_once('components/header.php'); ?>

<div class="container py-5">
    <div class="card shadow-lg p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?php echo $profile['profile_picture'] ?? './images/default-profile.jpg'; ?>" class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;" alt="Profile Picture">
                <h4><?php echo htmlspecialchars($profile['full_name']); ?></h4>
                <p class="text-muted mb-0"><?php echo $profile['profile_for']; ?></p>
                <p class="text-muted">Age: <?php echo $age; ?></p>
            </div>
            <div class="col-md-8">
                <h5 class="mb-3">About Me</h5>
                <p><?php echo nl2br(htmlspecialchars($profile['about_me'])); ?></p>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> <?php echo date("d M, Y", strtotime($profile['dob'])); ?></p>
                        <p><strong>Gender:</strong> <?php echo $profile['gender']; ?></p>
                        <p><strong>Religion:</strong> <?php echo $profile['religion']; ?></p>
                        <p><strong>City:</strong> <?php echo $profile['lives_in']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Height:</strong> <?php echo $profile['height']; ?> cm</p>
                        <p><strong>Education:</strong> <?php echo $profile['education_level']; ?></p>
                        <p><strong>Occupation:</strong> <?php echo $profile['occupation']; ?></p>
                        <p><strong>Contact No:</strong> <?php echo $profile['mobile']; ?></p>
                        <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-auto" style="background-color: #c00745;">
    <?php include_once('components/footer.php'); ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
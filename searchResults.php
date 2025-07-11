<?php
include_once('config.php'); // DB connection

$profile_for = ucfirst(strtolower($_GET['looking_for'] ?? ''));
$age_from = $_GET['age_from'] ?? '';
$age_to = $_GET['age_to'] ?? '';
$city = $_GET['city'] ?? '';
$religion = $_GET['religion'] ?? '';

// Build dynamic SQL query
$query = "SELECT * FROM user_profiles WHERE 1=1";

// Apply filters if set
if (!empty($profile_for)) {
    $query .= " AND profile_for = '" . mysqli_real_escape_string($conn, $profile_for) . "'";
}
if (!empty($age_from)) {
    $query .= " AND age >= " . intval($age_from);
}
if (!empty($age_to)) {
    $query .= " AND age <= " . intval($age_to);
}
if (!empty($city)) {
    $query .= " AND lives_in = '" . mysqli_real_escape_string($conn, $city) . "'";
}
if (!empty($religion)) {
    $query .= " AND religion = '" . mysqli_real_escape_string($conn, $religion) . "'";
}

// Randomize and limit to 15 results
$query .= " ORDER BY RAND() LIMIT 15";

$result = mysqli_query($conn, $query);
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
    <?php include_once('components/header.php'); ?>

  <div class="container py-4">
    <h4 class="text-center mb-4">Search Results</h4>

   <div class="row">
<?php if (mysqli_num_rows($result) > 0): ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-6 col-lg-4 mb-4 d-flex">
            <div class="card shadow-sm rounded-lg w-100">
                <img src="<?= !empty($row['profile_picture']) ? $row['profile_picture'] : './images/profile.jpg' ?>"
                     class="card-img-top img-fluid" alt="Profile Image" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title"><?= htmlspecialchars($row['full_name']) ?></h5>
                        <p class="card-text mb-1"><i class="bi bi-geo-alt-fill"></i> <?= htmlspecialchars($row['lives_in']) ?>, <?= htmlspecialchars($row['state']) ?></p>
                        <p class="card-text mb-1"><strong>Age:</strong> <?= $row['age'] ?></p>
                        <p class="card-text"><?= substr(htmlspecialchars($row['about_me']), 0, 90) ?>...</p>
                    </div>
                    <div class="mt-3 text-right">
                        <a href="viewProfile.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary" style="background-color: #c00745;">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <div class="col-12 text-center">
        <p class="alert alert-warning">No match found.</p>
    </div>
<?php endif; ?>
</div>
</div>


<?php include_once('components/footer.php'); ?>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>
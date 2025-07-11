<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
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
<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
<title>Customer-List</title>
</head>
<body>
    <?php require('./components/menu.php') ?>
    <div class="container-fluid">
    <h1> Matrimonial List </h1>

<?php
$query="SELECT * FROM user_profiles";
$rs=mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($rs)>0){
 ?>
 <div class="table-responsive">
 <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th rowspan="2">ID</th>
                <th rowspan="2">IMAGE</th>
                <th rowspan="2">FULL NAME</th>
                <th rowspan="2">PROFILE TYPE</th>
                <th rowspan="2">MOBILE </th>
                <th rowspan="2"> EMAIL ID</th>
                <th rowspan="2">LIVES IN</th>
                <th rowspan="2"> MOTHER TONGUE </th>
                <th rowspan="2"> EDUCATION </th>
                <th rowspan="2"> OCCUPATION</th>
                <th rowspan="2"> Father Name</th>
                <th rowspan="2"> Mother Name</th>
                <th rowspan="2"> PROFILE CREATION DATE</th>
                <th colspan="2"> Action</th>
            </tr>
            <tr>
                <th>Update</th>
</tr>
</thead>
    <tbody>
        <?php
    $i=1;
    while($rec=mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td> <?php echo $rec['id']?> </td>
             <td> <img src="<?php echo $rec['profile_picture']; ?>" class="img-fluid fixed-img" alt="Profile Picture"></td>
              <td> <?php echo $rec['full_name']?> </td>
               <td> <?php echo $rec['profile_for']?> </td>
                <td> <?php echo $rec['mobile']?> </td>
                <td> <?php echo $rec['email']?> </td>
                <td> <?php echo $rec['lives_in']?> </td>
                <td> <?php echo $rec['mother_tongue']?> </td>
                <td> <?php echo $rec['education_level']?> </td>
                <td> <?php echo $rec['occupation']?> </td>
                <td> <?php echo $rec['father_name']?> </td>
                <td> <?php echo $rec['mother_name']?> </td>
                <td> <?php echo $rec['created_at']?> </td>
                <td> <form  method="post" action="MatrimonialListUpdate.php">
                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($rec['id']); ?>">
                 <button type="submit" name="submit_update" class="btn btn-primary"> Update </button>
    </form> </td>
    <!--            <td>
    <form method="post" action="MatrimonialDelete.php" onsubmit="return confirm('Are you sure you want to delete this Profile?');">
        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($rec['id']); ?>">
        <button type="submit" name="delete_profile" class="btn btn-danger"> Delete </button>
    </form>
</td>-->
        </tr>
    <?php
    $i++;
}
?>
<?php
}
else{
    echo "Sorry no record found!";
}
?>
</tbody>
</table>
</div>
<?php include_once('components/footer.php'); ?>
</div>

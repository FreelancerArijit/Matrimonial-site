<?php require('config.php'); 
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}?>

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
    <h1> Customer List </h1>
</div>
<?php
if(isset($_GET['msg'])){
    echo '<div id="successMsg" class="alert alert-success text-center" role="alert">'
                 .htmlspecialchars($_GET['msg']).
              '</div>';
}
?>
<script>
  // Wait until the DOM is loaded
  document.addEventListener("DOMContentLoaded", function() {
    // Select the alert message
    var msg = document.getElementById('successMsg');
    if (msg) {
      // Hide after 3 seconds (3000 milliseconds)
      setTimeout(function() {
        // Fade out effect using opacity
        msg.style.transition = "opacity 0.5s ease";
        msg.style.opacity = '0';

        // After fade out, set display to none to remove it from the flow
        setTimeout(function() {
          msg.style.display = 'none';
        }, 500); // match fade out duration
      }, 3000);
    }
  });
</script>
<?php
$query="SELECT * FROM Customers";
$rs=mysqli_query($conn,$query) or die(mysqli_error($conn));
if(mysqli_num_rows($rs)>0){
 ?>
 <div class="table-responsive">
 <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th rowspan="2">ID</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Email</th>
                <th rowspan="2">Contact No.</th>
                <th rowspan="2">Registration Date</th>
                <th colspan="3"> Action </th>
            </tr>
            <tr>
                <th>Update</th>
                <th>Block/Unblock</th>
                <th>Delete</th>
</tr>
</thead>
    <tbody>
        <?php
    $i=1;
    while($rec=mysqli_fetch_assoc($rs)){
        ?>
        <tr>
            <td> <?php echo $rec['id']?> </td>
             <td> <?php echo $rec['name']?> </td>
              <td> <?php echo $rec['email']?> </td>
               <td> <?php echo $rec['mobile']?> </td>
                <td> <?php echo $rec['created_at']?> </td>
                <td> <form  method="post" action="CustomerUpdate.php">
                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($rec['id']); ?>">
                 <input type="submit" name="submit_update" value="Update" class="btn btn-primary">
    </form> </td>
    <td>
    <form method="post" action="BlockUnblockCustomer.php">
        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($rec['id']); ?>">
        <input type="hidden" name="current_status" value="<?php echo htmlspecialchars($rec['status']); ?>">
        <?php if ($rec['status'] === 'blocked'): ?>
            <input type="submit" name="toggle_status" value="Unblock" class="btn btn-success">
        <?php else: ?>
            <input type="submit" name="toggle_status" value="Block" class="btn btn-warning">
        <?php endif; ?>
    </form>
        </td>
                <td>
    <form method="post" action="DeleteCustomer.php" onsubmit="return confirm('Are you sure you want to delete this customer?');">
        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($rec['id']); ?>">
        <input type="submit" name="submit_delete" value="Delete" class="btn btn-danger">
    </form>
</td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
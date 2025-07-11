<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_update'])) {
    $customer_id = intval($_POST['customer_id']);
    $query = "SELECT * FROM Customers WHERE id = $customer_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $customer = mysqli_fetch_assoc($result);
    } else {
        echo "Customer not found.";
        exit;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Update Customer Details</h2>
        <form method="post" action="CustomerUpdateAction.php">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" value="<?php echo htmlspecialchars($customer['mobile']); ?>" class="form-control" required>
            </div>

            <input type="submit" name="update_customer" value="Update" class="btn btn-success">
            <a href="CustomerList.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
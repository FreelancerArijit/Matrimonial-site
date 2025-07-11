<?php
require('config.php');
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}
$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Messages - Admin View</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
</head>
<body>
 <?php require('./components/menu.php') ?>
<div class="container-fluid mt-2">
  <h2>Contact Messages</h2>
  <div class="table-responsive">
  <table class="table table-bordered table-striped mt-3">
    <thead>
      <tr>
        <th>Reference No.</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Submitted At</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['ref_no']); ?></td>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email_id']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
             <td><?php echo $row['status'] === 'read' ? '<span class="badge badge-success">Read</span>' : '<span class="badge badge-warning">Pending</span>'; ?></td>

            <td>
          <form method="post" action="contact_actions.php" class="d-inline">
            <input type="hidden" name="ref_no" value="<?php echo $row['ref_no']; ?>">
            <button type="submit" name="mark_read" class="btn btn-sm btn-primary">Mark as Read</button>
          </form>
          <form method="post" action="contact_actions.php" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
            <input type="hidden" name="ref_no" value="<?php echo $row['ref_no']; ?>">
            <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr>
      <td colspan="7" class="text-center">No contact messages found.</td>
    </tr>
  <?php endif; ?>
</tbody>
  </table>
</div>
      </div>

      <div class="container-fluid" style="position: absolute; bottom: 0;">
      <?php include_once('components/footer.php'); ?>
      </div>
</body>
</html>

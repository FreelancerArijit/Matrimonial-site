<?php
require("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$full_name=$_POST['name'];
$email_id = $_POST['email'];
$message = $_POST['message'];
$sql="INSERT INTO contacts(full_name, email_id, message)
 VALUES ('$full_name','$email_id', '$message')";
 if (mysqli_query($conn, $sql)) {
     header("Location: contact.php?status=success");
        exit;
    } else {
     header("Location: contact.php?status=error");
        exit;
}
}
?>
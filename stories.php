<?php
require('config.php');

// check if the user is login to share the story 
    if (!isset($_SESSION['user_id'])) {
    header('location:userLogin.php');
    exit;
}

// Function to handle image upload
function uploadImage($inputName) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadDir = "uploads/Stories/";

    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = basename($_FILES[$inputName]['name']);
        $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions)) {
            return null;
        }

        $newImageName = uniqid('img_', true) . '.' . $ext;
        $uploadPath = $uploadDir . $newImageName;

        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadPath)) {
            return $uploadPath;
        }
    }

    return null;
}

    if(isset($_POST['submit'])){
        $userId = $_SESSION['user_id'];
        $name=$_SESSION['name'];
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $story=mysqli_real_escape_string($conn,$_POST['story']);
      
$imagePath = uploadImage('img');
if ($imagePath === null) {
        echo "<script>alert('Image upload failed. Only JPG, PNG, JPEG, GIF allowed.'); window.location.href='stories.php'</script>";

        exit;
    }
$query="INSERT INTO story (user_id, Customer_Name, story_image, story_title, description) 
                  VALUES ('$userId','$name','$imagePath', '$title', '$story')";
$res=mysqli_query($conn, $query);
             if ($res) {
            echo "<script>alert('Story submitted successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Failed to submit story.'); window.location.href='index.php'</script>";
        } 
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
<link rel="stylesheet" href="./css/custom.css">
<link rel="icon" type="image/png" href="images/favicon.jpg" sizes="20x20">
<title>ShadiWadi.com</title>
</head>
<body>
    <?php include_once('components/header.php'); ?>
    <div class="container py-5 flex-fill">
        <div class="col">
            <form method="POST" enctype="multipart/form-data">

            <div class="col-4 m-auto text-center py-4 rounded-lg" style="min-height: 150px; min-width: 240px; background-color: white; ">
            <label for="image">Upload your image</label>
            <input type="file" name="img" id="" >
            </div>

             <div class="col-4 m-auto mt-2 text-center py-4 rounded-lg" style=" display: flex; flex-direction: column; max-width: 1100px;">
           <input type="text" name="title" id="" placeholder="Write story title" style="margin-bottom: 20px; max-width: 1068px; padding: 20px 20px; border-radius: 8px; border: none;">
           <textarea name="story" id="myTextArea" cols="30" rows="10"  placeholder="Write your story in max 150 charecters" style="padding: 10px 20px; border-radius: 8px; border: none" oninput = "updateCount()"></textarea>
           <p class="ml-auto mt-2"><span id="charCount">150</span> charecters remaining</p>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary m-auto mt-3" style="max-width: 350px;">

            </form>

        </div>
  
  
</div>

<div class="container-fluid mt-auto position-relative" style="background-color: #c00745; top: 10%; ">


<?php include_once('components/footer.php'); ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

<script>

function updateCount(){
        const textarea = document.querySelector("#myTextArea");
        const charCount = document.querySelector("#charCount");
        let max = 150;
        charCount.innerHTML = max - textarea.value.length;

        if(textarea.value.length > max){
            alert("Please write your  story within 150 charecters");
            charCount.innerHTML = 0;
        }


    }

    </script>

</body>
</html>
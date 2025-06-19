<?php

include 'config.php';


session_start();
$user_id = isset($_SESSION['S_id']) ? $_SESSION['S_id'] : null;


$conn = new mysqli('localhost','root','','stor');  // Replace with your actual database credentials

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] =='GET') {
   // GET method: Show the data of the client

   if (!isset($_GET["S_id"])) {
       header("location: ./home.php");
       exit;
   }

   $S_id = $_GET["S_id"];
   // Now you have the $S_id from the URL parameters

   // Retrieve user data from the 'starfe' table
   $sql = "SELECT * FROM starfe WHERE S_id=$S_id";
   $result = $conn->query($sql);
   $fetch = $result->fetch_assoc();

   if (!$fetch) {
       header("location:./home.php");
       exit;
   }
}


if(isset($_POST['update_profile'])){
   // Retrieve S_id from the form
   $S_id = $_POST['S_id'];

   // Sanitize input and update user data
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   mysqli_query($conn, "UPDATE starfe SET Name='$update_name', email='$update_email' WHERE S_id='$S_id'") or die('query failed');

   // Check and update password if necessary
   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

   if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
       if ($update_pass != $old_pass) {
           $message[] = 'old password not matched!';
       } elseif ($new_pass != $confirm_pass) {
           $message[] = 'confirm password not matched!';
       } else {
           mysqli_query($conn, "UPDATE starfe SET password='$confirm_pass' WHERE S_id='$S_id'") or die('query failed');
           $message[] = 'password updated successfully!';
       }
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM starfe WHERE S_id='$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">

   

      <div class="flex">
      <input type="hidden" name="S_id" value="<?php echo $user_id; ?>">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['Name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            </div>
           <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>
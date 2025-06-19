<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $select = mysqli_query($conn, "SELECT * FROM `starfe` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['S_id'];

        $selectType = mysqli_query($conn, "SELECT `type` FROM `starfe` WHERE email = '$email'") or die('query failed');

        if (mysqli_num_rows($selectType) > 0) {
            $fetch = mysqli_fetch_assoc($selectType);
            $userType = $fetch['type'];

            if ($userType === 'admin') {
                header('Location: home.php');
                exit();
            } 
            else if ($userType === 'book-keeper') {
               header('Location:../book-keeper/bkeeper.php');
               exit();
           } 
           else if ($userType === 'f_manager') {
            header('Location:../f_manager/finansial.php');
            exit();
            } 
            else if ($userType === 'rq-manager') {
               header('Location:../rqmanager/reqmanager/index.php');
               exit();
               } 
            // Add other user type checks and redirects here
        }
    } else {
        $message[] = 'Incorrect email or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="../css/header.css">

</head>
<body>
<header class="header">

<div class="header-1">

    <a href="" class="logo"> AnyBook  </a>

    <form action="" class="search-form">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="icons">
        <div  id="search-btn" class="fas fa-search"></div>
       
    </div>
   

</div>

<div class="header-2">

    <div class="navbar">
        <a href="../Untitled-1.html">Home</a>
        <a href="../rqmanager/contact.html">contact us </a>
        <a href="../about us page/About Us.html">about us</a>
        <a href="login.php">administrator</a>
        
    </div>

</div>

</header>
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Administrator</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
     
   </form>

</div>

</body>
</html>
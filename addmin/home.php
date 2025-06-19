<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="./css/style.css">

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
    <a href="home.php?logout=<?php echo $user_id; ?>" class="">logout</a>

</div>

<div class="header-2">

    <div class="navbar">
        <a href="../Untitled-1.html">Home</a>
        <a href="">contact us </a>
        <a href="./about us page/About Us.html">about us</a>
        <a href="./addmin/login.php">administrator</a>
        
    </div>

</div>

</header>
<a class="btn" href="register.php" role="button">Add a new starf</a><br><br>
   
<?php
         $select = mysqli_query($conn, "SELECT * FROM `starfe` WHERE S_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
         }
?>




         <table border="2">
         <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>password</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
        <?php

         $conn = mysqli_connect('localhost','root','','stor') or die('connection failed');

         $sql = "SELECT * FROM  starfe";
         $result = $conn->query($sql);
         
         while ($row = $result->fetch_assoc()){
            echo"
            <tr>
            <td>$row[S_id]</td>
            <td>$row[Name]</td>
            <td>$row[email]</td>
            <td>$row[password]</td>
            <td>$row[type]</td>
            <td>
            <a class='kk' href='./update_profile.php?S_id=$row[S_id]'>edit</a>
            <a class='kk' href='./delete.php?S_id=$row[S_id]'>delete</a>
            </td>
            </tr>
            
            ";
         }
         ?>
        
      </tbody>
         </table>
   

<section class="footer">

<section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>our locations</h3>
                <a href=""><i class="fas fa-map-marker-alt"></i>colombo,srilanka</a>
                <a href=""><i class="fas fa-map-marker-alt"></i>galle,srilanka</a>
                <a href=""><i class="fas fa-map-marker-alt"></i>mathara,srilanka</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href=""><i class="fas fa-phone"></i>041000000</a>
                <a href=""><i class="fas fa-phone"></i>071220000</a>
                <a href=""><i class="fas fa-envelope"></i>kashum@gmail.com</a>
               
            </div>
        </div>

        <div class="share">
            <a href=""><i class="fas fa-facebook"></i></a>
            <a href=""><i class="fas fa-twitter"></i></a>
            <a href=""><i class="fas fa-instagram"></i></a>
            <a href=""><i class="fas fa-linkedin"></i></a>
            <a href=""><i class="fas fa-square-pinterest"></i></a>
        </div>

        <div class="credit">create by 04.2-10 group <span></span> | all rights reserved</div>

  </section>

</body>
</html>
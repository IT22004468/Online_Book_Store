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
   header('location:../addmin/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/check.css">


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
            <a href="finansial.php?logout=<?php echo $user_id; ?>" class="">logout</a>
        </div>

        <div class="header-2">

            <div class="navbar">
                <a href="../Untitled-1.html">Home</a>
                <a href="../rqmanager/contact.html">contact us </a>
                <a href="../about us page/About Us.html">about us</a>
                <a href="../addmin/login.php">administrator</a>
                
            </div>

        </div>

    </header>
    
    
<!----youer boddy-->

<div class="bax">
<h1>Payment Approval</h1>
<p>The payment method for your review is submitted to the Check Payment platform</p><br><br>

<button type="button"class="btn"> <a href="report.php">Update To Report</button></a><br><br>

<h2>Check Details</h2>
<hr>

<table border="1">
    <tr>
      <th>Book Id</th>
      <th>Order Id</th>
      <th>Custermer Name</th>
      <th>Date & Time</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  
  <?php
$severname="localhost";
$username="root";
$password="";
$database="stor";

//create connection
$connection=new mysqli($severname, $username, $password, $database);

//check connection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

//read all row from database table
$sql = "SELECT * FROM oders";
$result = $connection->query($sql);

if(!$result){
    die("Invalid query:" . $connection->error);
}

//read all data of each row
while($row= $result->fetch_assoc()) {
    echo "
    <tr>
    <td>$row[Book_id]</td>
    <td>$row[Order_id]</td>
    <td>$row[C_name]</td>
    <td>$row[Date_time]</td>
    <td>$row[price]</td>
    <td>
    <a class='bttn1' href='cussumm.php?Order_id=$row[Order_id]'>Read</a>
    <a class='bttn2' href='.deled.php?Order_id=$row[Order_id]'>Delete</a>
    </td>
    </tr>
    ";}
    ?>
      </table>
    </div>

<!----youer boddy--> 

    <!---footer start-->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>our locations</h3>
                <a href=""><i class="fas fa-map-marker-alt"></i>colombo,srilanka</a>
                <a href=""><i class="fas fa-map-marker-alt"></i>galle,srilanka</a>
                <a href=""><i class="fas fa-map-marker-alt"></i>mathara,srilanka</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href=""><i class="fas fa-arrow-right"></i>home</a>
                <a href=""><i class="fas fa-arrow-right"></i>freatured</a>
                <a href=""><i class="fas fa-arrow-right"></i>arrivals</a>
                <a href=""><i class="fas fa-arrow-right"></i>blogs</a>
              
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href=""><i class="fas fa-arrow-right"></i>account info</a>
                <a href=""><i class="fas fa-arrow-right"></i>ordered items</a>
                <a href=""><i class="fas fa-arrow-right"></i>privacy policy</a>
                <a href=""><i class="fas fa-arrow-right"></i>payment method</a>
                <a href=""><i class="fas fa-arrow-right"></i>our services</a>
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

        <div class="credit">create bTY <span></span> | all rights reserved</div>

  </section>
</body>
</html>
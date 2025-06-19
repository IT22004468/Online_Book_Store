<?php

include 'config.php';
session_start();
$user_id = $_SESSION['emailaddress'];

if(!isset($user_id)){
   header('location:login.html');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:./login.html');
}
?>


<?php 
session_start();
$email = $_SESSION['emailaddress'];



$servername = "localhost";
$username = "root";
$password = "";
$database = "stor";

//create connection
$connection = new mysqli( $servername,$username,$password,$database);

$firstname = ""; 
$lastname = "";
$mobilenumber = "";
$emailaddress = "";
$passwords = "";
$address = "";
$date = "";


$errorMessage = "";
$successMessage = "";


    //read the row of the selected user from database
    
    $sql = "SELECT * FROM registration WHERE emailaddress = '$email'";
    $stmt = $connection->prepare($sql);
   
    

    $stmt->execute();

    $result = $stmt->get_result();

     
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $mobilenumber = $row["mobilenumber"];
        $emailaddress = $row["emailaddress"];
        $address = $row["address"];
        $date = $row["date"];
        $passwords = $row["password"];
    } else {
        $errorMessage = "User not found.";
    }

    $stmt->close();



?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="style/userprofile.css">
    <script src="script.js"></script>

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
    <a href="userprofile.php?logout=<?php echo $user_id; ?>" class="">logout</a>

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
    
<br><h1>My Account</h1><br>
<!-- add a logo (b) -->
<img src = "image/user.jpg" width="200" height="200" class="logo"><br><br>
<div class = "details">
        
        <!--personal details-->
        
        <div class = "personal_details">
        <h2>Personal Details</h2><br>

        <label for = "firstname">First Name</label><br>
        <input class = "inputfield" type="text" value=" : <?php echo $firstname; ?>" name="firstname" readonly><br><br>
	 
	    <label for = "lastname">Last Name</label><br>
        <input class = "inputfield" type="text" value=" : <?php echo $lastname; ?>" name="lastname" readonly><br><br>
	 
	    <label for = "mobilenumber">Mobile Number</label><br>
	    <input class = "inputfield" type="text" value=" : <?php echo $mobilenumber; ?>" name="mobilenumber" readonly><br><br>
	 
	 <label for = "emailaddress">E-mail Address</label><br>
	 <input class = "inputfield" type="text" value=" : <?php echo $emailaddress; ?>" name="emailaddress" readonly><br><br>
	 
     <p><label for="address">Address</label></p>
	 <input class = "inputfield" type="text" value=" : <?php echo $address; ?>" name="address" readonly><br><br>
    
	 <label for="dob">Enter Your DOB</label><br>
     <input class = "inputfield" type="text" value=" : <?php echo $date; ?>" name="date" readonly><br><br>

    
     <a class="editbtn" href="edit.php">Edit Account</a>
     <a class="deletebtn" onclick="deleteProfile()">Delete Profile</a>
</br></br>
     
        </div>
</div>

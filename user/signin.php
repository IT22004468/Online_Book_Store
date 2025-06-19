<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    
    $email = $_POST["emailaddress"];
    $password = $_POST["passwords"];

    //check registration table
    $sql = "SELECT * FROM registration WHERE emailaddress = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION["emailaddress"] = $email;
        header("Location:userprofile.php");
    }
    else{
        echo "<script>alert('invalid credantial.'); window.location.href = 'login.html';</script>";
    }
}
else{
    header("Location:homepage.php");
}



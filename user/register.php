<?php
    require 'config.php';

    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $mobile = $_POST["mobilenumber"];
    $email = $_POST["emailaddress"];
    $address = $_POST["address"];
    $dob = $_POST["date"];
    $password = $_POST["passwords"];

    $sql = "INSERT INTO registration (id,firstname,lastname,gender,emailaddress,address,date,passwords,mobilenumber) VALUES('', '$fname', '$lname', '$gender', '$email','$address', '$dob', '$password', '$mobile')";
	$checkEmailQuery = "SELECT * FROM registration WHERE emailaddress = '$email'";
	
    $result = mysqli_query($conn, $checkEmailQuery);
    
   if (mysqli_num_rows($result) > 0) {
    echo '
    <script>
        alert("Email already exists. Please choose a different email.");
        window.location.href = "register.html";
    </script>';
    exit();
    }


    if (mysqli_query($conn,$sql)) {
        echo '
        <script>
            alert("Account Created Successfully.Please Login To Account");
            window.location.href = "login.html";
        </script>';
    } else {
        echo '<script>alert("Error in Insertion");</script>';
    }

    $conn->close();
?>
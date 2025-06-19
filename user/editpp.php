<?php
session_start();
$email = $_SESSION['emailaddress'];
include 'config.php';

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobilenumber = $_POST['mobilenumber'];
        $emailaddress = $_POST['emailaddress'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        
       
        $sql = "UPDATE registration SET firstname = '$firstname', lastname = '$lastname', mobilenumber = '$mobilenumber', emailaddress = '$emailaddress', address = '$address', date = '$date' WHERE emailaddress ='$email'";

        if (mysqli_query($conn,$sql)) {
            echo '
            <script>
                alert("Successfully Updated");
                window.location.href = "userprofile.php";
            </script>';
            session_start();
            $email = $_SESSION['emailaddress'];
        } else {
            echo '<script>alert("Error in Insertion");</script>';
        }

        
?>
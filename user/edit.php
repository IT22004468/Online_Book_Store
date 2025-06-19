<?php 
session_start();
$email = $_SESSION['emailaddress'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

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

//GET method
if ($_SERVER['REQUEST_METHOD'] == 'GET') 
{

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
        $passwords = $row["passwords"];
    } else {
        $errorMessage = "User not found.";
    }

    $stmt->close();

}
else
{
    //POST method

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mobilenumber = $_POST["mobilenumber"];
    $emailaddress = $_POST["emailaddress"];
    $address = $_POST["address"];
    $date = $_POST["date"];
    $passwords = $_POST["passwords"];


    // do {
    //     $sql = "UPDATE registration
    //            SET firstname = '$firstname', lastname = '$lastname', 
    //            mobilenumber = '$mobilenumber', emailaddress = '$emailaddress', 
    //            address = '$address', date = '$date', passwords = '$passwords' WHERE emailaddress = '$emailaddress'";

    //     $result = $connection->query($sql);
        
    //     if (!$result) {
    //         $errorMessage = "invalid query: " . $connection->error;
    //         break;
    //     }

    //     $successMessage = "Client updated correctly";

    // } while (true);

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="style/userprofile.css">
</head>
<body>

    
<br><h1>My Account</h1><br>
<!-- add a logo (b) -->
<img src = "image/user.jpg" width="200" height="200" class="logo"><br><br>
<div class = "details">
        
        <!--personal details-->
        
        <div class = "personal_details">
        <h2>Personal Details</h2><br>
        <form action = "editpp.php" method = "POST">

        <input type="hidden" value="<?php echo $emailaddress; ?>">

        <label for = "firstname">First Name</label><br>
        <input class = "inputfield"  name="firstname" type="text" value=" : <?php echo $firstname; ?>" ><br><br>
	 
	    <label for = "lastname">Last Name</label><br>
        <input class = "inputfield" type="text" name ="lastname" value=" : <?php echo $lastname; ?>" ><br><br>
	 
	    <label for = "mobilenumber">Mobile Number</label><br>
	    <input class = "inputfield" type="text" name="mobilenumber" value=" : <?php echo $mobilenumber; ?>" ><br><br>
	 
	 <label for = "emailaddress">E-mail Address</label><br>
	 <input class = "inputfield" type="text" name="emailaddress" value=" : <?php echo $emailaddress; ?>" ><br><br>
	
     <p><label for="address">Address</label></p>
	 <input class = "inputfield" type="text" name="address" value=" : <?php echo $address; ?>" ><br><br>
    
	 <label for="dob">Enter Your DOB</label><br>
     <input class = "inputfield" type="text" name="date" value=" : <?php echo $date; ?>" ><br><br>

     <input type = "submit" class="editbtn" value = "Save Account Details">


</form>   
     
</br></br>
     
        </div>
</div>

</body>

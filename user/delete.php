
<?php
include 'config.php';

if (isset($_GET['emailaddress'])) {
$emailaddress = $_GET['emailaddress'];

$sql = "DELETE FROM registration WHERE emailaddress = '$emailaddress'"; 

if (mysqli_query($conn, $sql)) {
    echo "Your account has been successfully deleted";
} else {
    echo "Error deleting your account: " . mysqli_error($conn);
}
}
else {
    echo "No email address provided for deletion.";
}
mysqli_close($conn);
?>
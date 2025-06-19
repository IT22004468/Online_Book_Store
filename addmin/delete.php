<?php
if (isset($_GET["S_id"])) {
    $S_id = $_GET["S_id"];

    $severname="localhost";
    $username="root";
    $password="";
    $database="stor";

    //create connection
   $connection=new mysqli($severname, $username, $password, $database);

   $sql = "DELETE FROM starfe WHERE S_id=$S_id";
   $connection->query($sql);

   header("location:home.php");
   exit;


}

?>
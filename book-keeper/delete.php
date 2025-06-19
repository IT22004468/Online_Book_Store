<?php
if (isset($_GET["num"])) {
    $num = $_GET["num"];

    $severname="localhost";
    $username="root";
    $password="";
    $database="stor";

    //create connection
   $connection=new mysqli($severname, $username, $password, $database);

   $sql = "DELETE FROM book WHERE num=$num";
   $connection->query($sql);

   header("location: /BookStore/bkeeper.php");
   exit;


}

?>
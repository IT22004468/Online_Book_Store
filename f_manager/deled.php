<?php
if (isset($_GET["Order_id"])) {
    $order = $_GET["Order_id"];

    $severname="localhost";
    $username="root";
    $password="";
    $database="stor";

    //create connection
   $connection=new mysqli($severname, $username, $password, $database);

   $sql = "DELETE FROM oders WHERE Order_id=$order";
   $connection->query($sql);

   header("location: /IWT ass/web-dev-project-uni/finansial.php");
   exit;


}

?>
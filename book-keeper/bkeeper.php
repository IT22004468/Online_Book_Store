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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="Styles/log.css">
	<link rel="stylesheet" href="Styles/log2.css">
    <link rel="stylesheet" href="Styles/bkeeper.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> !-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 
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
            <a href="bkeeper.php?logout=<?php echo $user_id; ?>" class="">logout</a>

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
    <div class="container my-5">
        
        <a class="but btn-lg" href="addBook.php" role="button">Add a new book</a><br><br>
        <h2>List of books</h2>
        <table class="t1">
            <thead>
                <tr>
                    <th></th>
                    <th>Book_ID</th>
                    <th>Category</th>
                    <th>Book_name</th>
                    <th>Author_name</th>
                    <th>image</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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
                $sql = "SELECT * FROM book";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query:" . $connection->error);
                }

                //read all data of each row
                while($row= $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[num]</td>
                    <td>$row[bookid]</td>
                    <td>$row[book_category]</td>
                    <td>$row[book_name]</td>
                    <td>$row[author_name]</td>
                    <td>$row[images]</td>
                    <td>$row[quantity]</td>
                    <td>$row[price]</td>
                    <td>
                    <a class='btn btn-primary btn-lg' href='/BookStore/edit.php?num=$row[num]'>Edit</a>
                    <a class='btn btn-danger btn-lg' href='/BookStore/delete.php?num=$row[num]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                ?>

            </tbody>   
        </table>
    </div>
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

<div class="credit">create by 04.2-10 group <span></span> | all rights reserved</div>

</section>
</body>
</html>
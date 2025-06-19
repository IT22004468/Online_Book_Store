<?php

$severname="localhost";
$username="root";
$password="";
$database="stor";

//create connection
$connection=new mysqli($severname, $username, $password, $database);

$book_id = "";
$quantity = "";
$price = "";
$date_t = "";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD']=='POST') {
    $book_id = $_POST["book_id"];
    $quantity = $_POST["quantity"];
    $price= $_POST["price"];
    $date_t  = $_POST["date_t"];
    
    do{
        if(empty($book_id) || empty($quantity) || empty($price) || empty($date_t) ) {
            $errorMessage = "All the files are requird";
            break;
        }

        //add new client in to the database
        $sql = "INSERT INTO reports (book_id,quantity, price, date_t)".
                "VALUES ('$book_id', '$quantity', '$price', '$date_t')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
       }


        $book_id = "";
        $quantity = "";
        $price = "";
        $date_t = "";
        
        $successMessage = "Added data correctly";

        header("location: /IWT ass/web-dev-project-uni/report.php");
        exit;

    }while (false);

}

?>
<!DOCTYPE html>
<head>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/repo.css">



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
            <button  class="login-btn">sing in</div>

        </div>

        <div class="header-2">

            <div class="navbar">
                <a href="#">Home</a>
                <a href="contact.html">contact us </a>
                <a href="">rrivals</a>
                <a href="">reviews</a>
                <a href="">blogs</a>
            </div>

        </div>

    </header>
<!----youer boddy-->
<h1><b>Update To Report</b></h1>


    <form method="POST" enctype="multipart/form-data" class="f1">
        <label for="book_id">Book Id:</label><br>
        <input type="text" id="book_id" name="book_id" value="<?php echo $book_id; ?>"placeholder="Book Id" required><br>
        <label for="quantity">Quantity:</label><br>
        <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" placeholder="Book Quantity" required ><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>" placeholder="Price" required><br>
        <label for="date_t">Date:</label><br>
        <input type="text" id="date_t" name="date_t" value="<?php echo $date_t; ?>" placeholder="Date of Purchase" required><br>

        <input type="submit" class="btn btn-outline-primary"  value="Submit">

        
</form>
        
        
      
<!----youer boddy-->

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
                <h3>quick links</h3>
                <a href=""><i class="fas fa-arrow-right"></i>home</a>
                <a href=""><i class="fas fa-arrow-right"></i>freatured</a>
                <a href=""><i class="fas fa-arrow-right"></i>arrivals</a>
                <a href=""><i class="fas fa-arrow-right"></i>blogs</a>
              
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href=""><i class="fas fa-arrow-right"></i>account info</a>
                <a href=""><i class="fas fa-arrow-right"></i>ordered items</a>
                <a href=""><i class="fas fa-arrow-right"></i>privacy policy</a>
                <a href=""><i class="fas fa-arrow-right"></i>payment method</a>
                <a href=""><i class="fas fa-arrow-right"></i>our services</a>
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

        <div class="credit">create bTY <span></span> | all rights reserved</div>

  </section>
</body>
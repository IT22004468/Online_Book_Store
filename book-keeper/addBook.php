<?php

$severname="localhost";
$username="root";
$password="";
$database="stor";

//create connection
$connection=new mysqli($severname, $username, $password, $database);

$bookid = "";
$book_category = "";
$book_name = "";
$author_name = "";
$images = "";
$quantity = "";
$price = "";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD']=='POST') {
    $bookid = $_POST["bookid"];
    $book_category = $_POST["booktitle"];
    $book_name = $_POST["bookname"];
    $author_name = $_POST["bookauthor"];
    $images = $_POST["images"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    do{
        if(empty($bookid) || empty($book_category) || empty($book_name) || empty($author_name) || empty($quantity) || empty($price)) {
            $errorMessage = "All the files are requird";
            break;
        }

        //add new client in to the database
        $sql = "INSERT INTO book (bookid,book_category, book_name, author_name, images, quantity, price)".
                "VALUES ('$bookid', '$book_category', '$book_name', '$author_name', '$images', '$quantity', '$price')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
       }


        $bookid = "";
        $book_category = "";
        $book_name = "";
        $author_name = "";
        $images = "";
        $quantity = "";
        $price = "";

        $successMessage = "A new book added correctly";

        header("location: /BookStore/bkeeper.php");
        exit;

    }while (false);

}

?>

<!DOCTYPE html>
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Online Book Shop</title>
    <link rel="stylesheet" href="Styles/log.css">
	<link rel="stylesheet" href="Styles/log2.css">
    <link rel="stylesheet" href="Styles/adbook.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


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
                <a href="">contact us </a>
                <a href="">rrivals</a>
                <a href="">reviews</a>
                <a href="">blogs</a>
            </div>

        </div>

    </header>
    <!----youer boddy-->

    <br><br>
    <marquee behavior="rights" direction="rights" ><p class=".mar">- - Please  fill  the  above  form  to  add  a  book  on  the  site - -</p></marquee><br>

    <div class="container my-5">

    

    <form method="post" enctype="multipart/form-data" class="f1">
        <h1 class="one">Book Registation Document</h1><br>

        <?php
    if (!empty($errorMessage) ) {
        echo 
        "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
         <strong>$errorMessage</strong>
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
         </div>
        ";
    }
    ?>
        <br>
        <label for="bookid">Book ID:</label><br>
        <input type="text" id="bookid" name="bookid" value="<?php echo $bookid; ?>" placeholder="Enter Book ID"  required><br><br>

        <label for="booktitle">Book Title:</label><br>
        <input type="text" id="booktitle" name="booktitle" value="<?php echo $book_category; ?>"  placeholder="Enter Book Title" required><br><br>

        <label for="bookname">Book Name:</label><br>
        <input type="text" id="bookname" name="bookname" value="<?php echo $book_name; ?>"  placeholder="Enter Book Name" required><br><br>

        <label for="bookauthor">Book Author's Name:</label><br>
        <input type="text" id="bookauthor" name="bookauthor" value="<?php echo $author_name; ?>"  placeholder="Enter Book Author's name" required><br><br>
     
        <label for="addimage">Upload an Image:</label><br>
        <input type="file" name="images" value="<?php echo $images; ?>"  id="images" ><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" placeholder="Enter Quantity" required><br><br>

        <label for="price">Book Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>" placeholder="Enter Book Price(Rs)" required><br><br>

        <?php
        if (!empty($successMessage) ) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismis='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
        }

        ?>
        
        <input type="submit" class="btn btn-outline-primary"  value="Submit">
        <button type="button" class="btn btn-outline-primary col-lg-3 d-grid "><a href="/BookStore/bkeeper.php">Cancel</a></button>


    </form >
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
</body>
</html>>
<!DOCTYPE html>
<html>
<head>
    <title>Online Book Shop</title>
    <script src="js/screen.js"></script>
    <script>document.write(data());</script>
	https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/receipt.css">

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
                <a href="Untitled-1.html">Home</a>
                <a href="#">contact us </a>
                <a href="">rrivals</a>
                <a href="">reviews</a>
                <a href="">blogs</a>
            </div>

        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>INVOICE</h4>
                </div>
                <div class="receipt">
                    <div class="anyreci">
                    <div><h1>ANYBOOK</h1></div>
                    <div><h1>Receipt</h1></div>
                    </div>
                    <div class="date">
                    <form action="#" method="POST" oderid="add_form">
                            <input type="date" name="datet" class="form-control"
                            placeholder="DATE" required>
                    </div>
                    <br><br>
                    <div class="mala">
                        To<br>
                        Malabe city,Srilanka
                    </div>
                    <div class="info">
                        <div>
                            <input type="number" name="oderid" class="form-control"
                            placeholder="INVOICE NUMBER :" required></div>
                        <div>United Kindom</div>
                        
                    </div>
                    <br><br>
            
                        <input type="text" name="book_name" class="form-control"
                        placeholder="Book name" required>
                        <input type="number" name="quantity" class="form-control"
                        placeholder="Quantity" required>
                        <input type="text" name="cname" class="form-control"
                        placeholder="Custormer name" required>
                        <input type="number" name="price" class="form-control"
                        placeholder="Price" required>
                        <input type="number" name="tamount" class="form-control"
                        placeholder="Total Amount" required><br><br>

                        <input type="submit" class="btn"  value="Submit">
                        

                        
                    </form>
                    
                    

                   
                    </div>
                    </div>

<?php

$severname="localhost";
$username="root";
$password="";
$database="savidya";

//create connection
$connection=new mysqli($severname, $username, $password, $database);

$oderid = "";
$datet = "";
$book_name = "";
$quantity = "";
$cname = "";
$price = "";
$tamount = "";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD']=='POST') {
    $oderid = $_POST["oderid"];
    $datet = $_POST["datet"]; 
    $book_name= $_POST["book_name"];
    $quantity  = $_POST["quantity"];
    $cname  = $_POST["cname"];
    $price  = $_POST["price"];
    $tamount  = $_POST["tamount"];
    
    do{
        if(empty($oderid) || empty($datet) || empty($book_name) || empty($quantity) || empty($cname) || empty($price) || empty($tamount) ) {
            $errorMessage = "All the files are requird";
            break;
        }

        //add new client in to the database
        $sql = "INSERT INTO creceipt (oderid, datet, book_name, quantity, cname, price, tamount) ".
        "VALUES ('$oderid', '$datet', '$book_name', '$quantity', '$cname', '$price', '$tamount')";
        $result = $connection->query($sql);

        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
       }


       $oderid = "";
       $datet = "";
       $book_name = "";
       $quantity = "";
       $cname = "";
       $price = "";
       $tamount = "";
        
        $successMessage = "Added data correctly";

        header("location: /IWT ass/web-dev-project-uni/receipt.php");
        exit;

    }while (false);

}

?>
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
</html>
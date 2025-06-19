<html>
    <head>
        <title>custermer deatils</title>
        <link rel="stylesheet" href="css/cus.css">
    </head>
    <body>

    
    <h1>Custermer Deatils</h1> 

<div class="box">

<h2>Summary</h2>

<div class="dis">
    <div><>Custermer Id:</div>
    <div>Name:</div>
</div>
<hr>

<table>
<tr>
<th>Orderid</th>
<th>Book id</th>
<th>bookname</th>
<th>Date & Time</th>
<th>Book quntity</th>
<th>Phone Number</th>
<th>email</th>
<th>Custermer Name</th>
<th>price</th>
<th>Total amount</th>
<th>Action</th>
</tr>



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

       
        if($_SERVER['REQUEST_METHOD'] == 'GET')

        $order=$_GET["Order_id"];
        //read all row from database table
        $sql = "SELECT * FROM oders WHERE Order_id=$order";
        $result = $connection->query($sql);
        $row=$result->fetch_assoc();
        
        //if(!$result){
           // die("Invalid query:" . $connection->error);
       // }
        
        //read all data of each row
        
            echo "
            <tr>
            <td>$row[Order_id]</td>
            <td>$row[Book_id]</td>
            <td>$row[bookname]</td>
            <td>$row[Date_time]</td>
            <td>$row[quantity]</td>
            <td>$row[Phone]</td>
            <td>$row[email]</td>
            <td>$row[C_name]</td>
            <td>$row[price]</td>
            <td>$row[Total_amount]</td>
            <td>
            
            </tr>

        ";

            ?>
        </table>

            <button type="button"class="butt"><a href="finansial.php">Approval</a></button>
            <button type="button"class="butt1"><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#sent?compose=new">Send Email</a></button>
            <button type="button"class="button"><a href="receipt.php">Create receipt</a></button>
</div>
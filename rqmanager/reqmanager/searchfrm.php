<?php
include('connection.php');

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        /* Add styles for the detailed view page */
        body {
            background-color: #000;
            color: #fff;
        }

        .navbar {
            background-color: #222;
        }

        .page-wrapper {
            margin-top: 50px;
        }

        h2 {
            color: #5cb85c;
        }

        .form-container {
            background-color: #222;
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #5cb85c;
        }

        .btn-default {
            background-color: #5cb85c;
            color: #fff;
            border: none;
        }

        .btn-default:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
 
                <?php
                $query = 'SELECT * FROM people
                    WHERE
                    people_id =' . $_GET['id'];
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                while ($row = mysqli_fetch_array($result)) {
                    $zz = $row['people_id'];
                    $i = $row['first_name'];
                    $a = $row['last_name'];
                    $b = $row['mid_name'];
                }
                $id = $_GET['id'];
                ?>
                <div class="col-lg-12">
                    <h2>Detailed View</h2>
                    <div class="col-lg-6">
                        <form role="form" method="post" action="index.php">
                            <div class="form-container">
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $i; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $a; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Middle Name" name="Middlename" value="<?php echo $b; ?>">
                                </div>
                                <button type="submit" class="btn btn-default">Return to main menu</button>
                            </div>
                        </form>
                    </div>
                </div>



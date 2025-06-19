<?php
include('connection.php');

?>
<?php

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:.../admin/login.php');
}

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href=".../css/header.css">
<link rel="stylesheet" href=".../addmin/css/style.css">

    <style>
       
        body {
            background-color: #000;
            color: #fff;
        }

        
        table {
            font-family: Arial, sans-serif; 
            border-collapse: collapse;
            width: 100%;
            background-color: #fff; 
        }

        th, td {
            text-align: left;
            padding: 8px;
            color: #000; 
        }

        th {
            background-color: #222;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        .btn-view,
        .btn-edit,
        .btn-delete {
            padding: 5px 15px; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px; 
        }

        .btn-view {
            background-color: #5cb85c; 
            color: #fff;
        }

        .btn-edit {
            background-color: #f0ad4e; 
            color: #000; 
        }

        .btn-delete {
            background-color: #d9534f; 
            color: #fff;
        }
    </style>
</head>

<body>
<header class="header">

<div class="header-1">

    <a href="index.php?logout=<?php echo $user_id; ?>" class="">logout</a>

</div>

<div class="header-2">

</div>

</header>
    <div id="wrapper">
   
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <h2>List Support Messages</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = 'SELECT * FROM people';
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['first_name'] . '</td>';
                                    echo '<td>' . $row['last_name'] . '</td>';
                                    echo '<td>' . $row['mid_name'] . '</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-xs btn-view" href="searchfrm.php?action=edit&id=' . $row['people_id'] . '">VIEW</a>';
                                    echo '<a class="btn btn-xs btn-edit" href="edit.php?action=edit&id=' . $row['people_id'] . '">EDIT</a>';
                                    echo '<a class="btn btn-xs btn-delete" href="del.php?type=people&delete&id=' . $row['people_id'] . '">DELETE</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

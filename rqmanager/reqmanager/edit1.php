<?php
$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$mname = $_POST['Middlename'];

include('connection.php');

$query = 'UPDATE people SET first_name = ?, last_name = ?, mid_name = ? WHERE people_id = ?';
$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "sssi", $fname, $lname, $mname, $zz); // 4 placeholders, bind 4 parameters
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<body>
<script type="text/javascript">
    alert("Update Successful.");
    window.location = "index.php";
</script>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mid_name = $_POST['mid_name'];

    $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'peopledb' ) or die(mysqli_error($db));

   
    $sql = "INSERT INTO people (first_name, last_name, mid_name) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $first_name, $last_name, $mid_name);

    if ($stmt->execute()) {
        
        echo "Data inserted successfully!";
    } else {
        
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $db->close();
}
?>

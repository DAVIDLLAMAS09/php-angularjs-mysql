<?php

include 'config.php';

$sel = mysqli_query($con,"select * from users");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array("id"=>$row['id'],"fname"=>$row['fname'],"lname"=>$row['lname'],"username"=>$row['username']);
}

echo json_encode($data);
?>
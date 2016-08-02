<?php

include '../db/database.php';
$pwaRegID = $_GET['pwaRegID'];
$sql = "SELECT * FROM pwaBranch WHERE pwaRegID='$pwaRegID'";

$result = mysqli_query($link, $sql);

$pwaBranchArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $pwaBranchArray[] = $row;
    
}

echo json_encode($pwaBranchArray);
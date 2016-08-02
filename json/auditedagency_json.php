<?php

include '../db/database.php';
$sql = "SELECT pwaBranchID, pwaBranchName , pwaRegName , "
        . "pwaBranchEmail , pwaBranchTel "
        . "FROM pwaBranch, pwaReg WHERE pwaBranch.pwaRegID=pwaReg.pwaRegID";

$result = mysqli_query($link, $sql);

$pwaBranchArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $pwaBranchArray[] = $row;
    
}

echo json_encode($pwaBranchArray);
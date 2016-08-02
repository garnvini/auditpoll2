<?php

include '../db/database.php';

$sql = "SELECT * FROM pwaReg";

$result = mysqli_query($link, $sql);

$pwaRegArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $pwaRegArray[] = $row;
    
}

echo json_encode($pwaRegArray);
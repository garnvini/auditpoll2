<?php

include '../db/database.php';
date_default_timezone_set('Asia/Bangkok');
$sql = "SELECT * FROM log, user WHERE log.userID = user.userID ORDER BY logDate DESC";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
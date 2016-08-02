<?php

include '../db/database.php';

$sql = "SELECT * FROM party";

$result = mysqli_query($link, $sql);

$partyArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $partyArray[] = $row;
    
}

echo json_encode($partyArray);
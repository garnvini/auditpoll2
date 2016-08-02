<?php

include '../db/database.php';
$partyID = $_GET['partyID']; 
$sql = "SELECT * FROM division WHERE partyID='$partyID'";

$result = mysqli_query($link, $sql);

$divisionArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $divisionArray[] = $row;
    
}

echo json_encode($divisionArray);
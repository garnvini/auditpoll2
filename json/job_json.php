<?php

include '../db/database.php';
$divisionID = $_GET['divisionID'];
$sql = "SELECT * FROM job WHERE divisionID='$divisionID'";

$result = mysqli_query($link, $sql);

$jobArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $jobArray[] = $row;
    
}

echo json_encode($jobArray);
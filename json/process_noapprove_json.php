<?php

include '../db/database.php';

$sql = "SELECT process.processID, pwabranch.pwaBranchName, process.processName, "
        . "process.beginDate, process.finishDate FROM process , "
        . "pwabranch WHERE process.pwaBranchID = pwabranch.pwaBranchID "
        . "AND process.processStatusID = 1";

$result = mysqli_query($link, $sql);

$provessArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $processArray[] = $row;
    
}

echo json_encode($processArray);
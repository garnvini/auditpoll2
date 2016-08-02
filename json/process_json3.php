<?php

include '../db/database.php';

$processStatusID = $_GET['processStatusID']; 
$sql = "SELECT process.processID , process.processName , "
        . "pwabranch.pwaBranchName , process.quarter, "
        . "process.fiscalYear, process.approveDate, user.userFullname, "
        . "processstatus.processStatusName FROM process , user, "
        . "processstatus , pwabranch WHERE "
        . "process.processStatusID = processstatus.processStatusID "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID "
        . "AND process.approveBy = user.userID "
        . "AND process.processStatusID IN (2,4)";

$result = mysqli_query($link, $sql);

$provessArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $processArray[] = $row;
    
}

echo json_encode($processArray);
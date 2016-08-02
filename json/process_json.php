<?php

include '../db/database.php';

$sql = "SELECT process.processID , process.processName , "
        . "pwabranch.pwaBranchName , process.quarter, "
        . "process.fiscalYear, process.approveDate, "
        . "processstatus.processStatusName FROM process , "
        . "processstatus , pwabranch WHERE "
        . "process.processStatusID = processstatus.processStatusID "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID";

$result = mysqli_query($link, $sql);

$provessArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $processArray[] = $row;
    
}

echo json_encode($processArray);
<?php

include '../db/database.php';

$userID = $_GET['userID']; 

$sql = "SELECT process.processName, process.beginDate, "
        . "process.finishDate, process.`quarter`, "
        . "process.fiscalYear, process.processID, "
        . "team.userID, process.processStatusID, "
        . "processstatus.processStatusName, "
        . "pwabranch.pwaBranchName "
        . "FROM process , team , processstatus , "
        . "pwabranch WHERE process.teamID = team.teamID "
        . "AND team.userID = '$userID' AND "
        . "process.processStatusID = processstatus.processStatusID "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID";

$result = mysqli_query($link, $sql);

$provessArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $processArray[] = $row;
    
}

echo json_encode($processArray);
<?php

include '../db/database.php';

$sql = "SELECT process.processID, process.processName, "
        . "process.`quarter`, process.fiscalYear, scoreteam.questionaireID, "
        . "division.divisionName, "
        . "pwabranch.pwaBranchName, processstatus.processStatusName "
        . "FROM scoreteam, process , job , division , "
        . "pwabranch , processstatus "
        . "WHERE auditpollnew.job.divisionID = auditpollnew.division.divisionID "
        . "AND scoreteam.processID = process.processID "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID "
        . "AND process.processStatusID = processstatus.processStatusID "
        . "AND process.processStatusID = 4 "
        . "GROUP BY process.processID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
<?php

include '../db/database.php';

$sql = "SELECT auditor.auditorID, auditor.auditorCode, auditor.auditorName, "
        . "auditor.auditorLastname, auditor.auditorPicture, "
        . "auditor.auditorPosition, scoreperson.questionaireID, "
        . "scoreperson.processID, process.processName, "
        . "pwabranch.pwaBranchName, process.fiscalYear, process.quarter, job.jobName, "
        . "division.divisionName, party.partyName "
        . "FROM scoreperson , auditor , process , "
        . "pwabranch , job , division , party "
        . "WHERE scoreperson.auditorID = auditor.auditorID "
        . "AND scoreperson.processID = process.processID "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID "
        . "AND auditor.jobID = job.jobID "
        . "AND job.divisionID = division.divisionID "
        . "AND division.partyID = party.partyID "
        . "GROUP BY scoreperson.auditorID,scoreperson.processID "
        . "ORDER BY pwabranch.pwabranchID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
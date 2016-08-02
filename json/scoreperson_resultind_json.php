<?php

include '../db/database.php';

$sql = "SELECT auditor.auditorID, auditor.auditorCode, "
        . "auditor.auditorName, auditor.auditorLastname, auditor.auditorPicture, "
        . "job.jobSynName, division.divisionSynName, "
        . "party.partySynName FROM auditor , "
        . "job , division , party "
        . "WHERE auditor.jobID = job.jobID "
        . "AND job.divisionID = division.divisionID "
        . "AND division.partyID = party.partyID "
        . "ORDER BY auditor.auditorCode";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
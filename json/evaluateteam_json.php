<?php

include '../db/database.php';

$sql = "SELECT job.jobName, division.divisionSynName, "
        . "party.partySynName, team.teamID "
        . "FROM team , job , division , party , process , auditor "
        . "WHERE process.teamID = team.teamID "
        . "AND team.head = auditor.auditorID "
        . "AND auditor.jobID = job.jobID "
        . "AND job.divisionID = division.divisionID "
        . "AND division.partyID = party.partyID "
        . "GROUP BY job.jobID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
<?php

include '../db/database.php';
$sql = "SELECT jobID, jobName AS 'งาน', divisionName AS 'กอง', partyName AS 'ฝ่าย' FROM job, division, party WHERE job.divisionID = division.divisionID "
        . "AND division.partyID = party.partyID ORDER BY party.partyID";

$result = mysqli_query($link, $sql);

$jobArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $jobArray[] = $row;
    
}

echo json_encode($jobArray);
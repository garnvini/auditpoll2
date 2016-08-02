<?php

include '../db/database.php';

$sql = "SELECT auditor.auditorID, auditor.auditorCode AS 'รหัสพนักงาน', "
        . "auditor.auditorPre AS 'คำนำหน้า', auditor.auditorName AS 'ชื่อ', "
        . "auditor.auditorLastname AS 'นามสกุล', auditor.auditorPicture AS 'ชื่อไฟล์ภาพ',"
        . "auditor.auditorPosition AS 'ตำแหน่ง', auditor.auditorLevel AS 'ชั้น', auditor.auditorOption AS ' ', "
        . "job.jobName AS 'งาน', division.divisionSynName AS 'กอง', "
        . "party.partyName AS 'ฝ่าย' FROM auditor , party , division , "
        . "job WHERE auditor.partyID = party.partyID AND "
        . "auditor.divisionID = division.divisionID AND auditor.jobID = job.jobID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
<?php

include '../db/database.php';
$attitudeTypeID = $_GET['attitudeTypeID'];
$questionaireID = $_GET['questionaireID']; 

$sql = "SELECT attitudeQuestionID, attitudeQuestionName, questionMethodName FROM attitudeQuestion, questionMethod "
        . "WHERE attitudeTypeID='$attitudeTypeID' "
        . "AND questionaireID='$questionaireID' "
        . "AND attitudeQuestion.questionMethodID=questionMethod.questionMethodID "
        . "ORDER BY attitudeQuestionID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
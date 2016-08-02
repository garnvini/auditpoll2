<?php

include '../db/database.php';
$questionTypeID = $_GET['questionTypeID'];
$questionaireID = $_GET['questionaireID']; 

$sql = "SELECT questionID, questionName, questionMethodName FROM question, questionMethod "
        . "WHERE questionTypeID='$questionTypeID' "
        . "AND questionaireID='$questionaireID' "
        . "AND question.questionMethodID=questionMethod.questionMethodID ORDER BY questionID";

$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
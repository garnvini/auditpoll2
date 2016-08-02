<?php

include '../db/database.php';
$processID = $_GET['processID'];
$questionaireID = $_GET['questionaireID'];
$sql = "SET @row_number = 0; ";
$result = mysqli_query($link, $sql);
$sql = "SELECT (@row_number:=@row_number + 1) AS num, question.questionName, "
        . "scoreteam.scorePoint FROM scoreteam , question "
        . "WHERE scoreteam.questionID = question.questionID "
        . "AND scoreteam.processID = '$processID' "
        . "AND scoreteam.questionaireID = '$questionaireID' "
        . "ORDER BY num";
$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
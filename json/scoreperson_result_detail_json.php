<?php

include '../db/database.php';
$auditorID = $_GET['auditorID'];
$processID = $_GET['processID'];
$questionaireID = $_GET['questionaireID'];
$sql = "SET @row_number = 0; ";
$result = mysqli_query($link, $sql);
$sql = "SELECT (@row_number:=@row_number + 1) AS num, question.questionName, "
        . "scoreperson.scorePoint FROM scoreperson , question "
        . "WHERE scoreperson.questionID = question.questionID "
        . "AND scoreperson.auditorID = '$auditorID' "
        . "AND scoreperson.processID = '$processID' "
        . "AND scoreperson.questionaireID = '$questionaireID' "
        . "ORDER BY question.questionID";
$result = mysqli_query($link, $sql);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
<?php

include '../db/database.php';
$processID = $_GET['processID'];
$questionaireID = $_GET['questionaireID'];
$sql = "SET @row_number = 0; ";
$result = mysqli_query($link, $sql);
$sql2 = "SELECT (@row_number:=@row_number + 1) AS num, "
        . "question.questionName, genanswer.genanswer "
        . "FROM question , genanswer , questiontype "
        . "WHERE question.questionTypeID = questiontype.questionTypeID "
        . "AND question.questionTypeID = 5 "
        . "AND genanswer.processID = '$processID' "
        . "AND genanswer.questionaireID = '$questionaireID' "
        . "AND genanswer.questionID = question.questionID "
        . "ORDER BY num";
$result2 = mysqli_query($link, $sql2);

$auditorArray = array();
while ($row = mysqli_fetch_assoc($result2)){
    $auditorArray[] = $row;
    
}

echo json_encode($auditorArray);
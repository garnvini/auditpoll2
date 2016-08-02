<?php
    include './db/database.php';
    
    $questionName = $_POST['questionName']; 
    $questionTypeID = $_POST['questionTypeID'];
    $questionMethodID = $_POST['questionMethodID'];
    $questionaireID = $_POST['questionaireID'];
    

    $sql = "INSERT INTO `question` (`questionName`, `questionTypeID`"
            . ", `questionaireID`, `questionMethodID`) "
            . " VALUES ('$questionName', '$questionTypeID', "
            . "'$questionaireID', '$questionMethodID')";
    
    $result = mysqli_query($link,$sql);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
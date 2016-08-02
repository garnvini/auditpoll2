<?php

include './db/database.php';
$userID = $_GET['userID'];

foreach ($userID as $id){
    $sql = "DELETE FROM user WHERE userID = '$id' ";
    $result = mysqli_query($link, $sql);
}

  if($result){

        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'ลบข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        header('Content-Type: application/json');
        $error = "เกิดข้อผิดพลาดในการลบ กรุณาลองใหม่ ". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
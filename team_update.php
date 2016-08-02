<?php
    include './db/database.php';
    include './session.php';
    
    $teamID = $_POST['teamID']; 
    $head = $_POST['head']; 
    $member1 = $_POST['member1']; 
    $member2 = $_POST['member2']; 
    $member3 = $_POST['member3']; 


    $sql = "UPDATE `team` SET `head`='$head', "
            . "`member1`='$member1', `member2`='$member2', "
            . "`member3`='$member3' WHERE (`teamID`='$teamID')";
    
    $result = mysqli_query($link,$sql);
    
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "แก้ไขทีมผู้ตรวจสอบ";
    $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
        
    $sql2="INSERT INTO `log` (`userID`, `userIP`, `logEvent`, `logTypeID`, `logDate`) "
            . "VALUES ('$s_userID', '$ip', '$event', '3', '$logDate')";
    $result2 = mysqli_query($link,$sql2);
    
    
    if($result){

        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));

        
    }
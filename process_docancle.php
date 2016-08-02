<?php
    include './db/database.php';
    include './session.php';
    
    $processID = $_POST['processID']; 
    $processName = $_POST['processName'];  
    $approveDate  = date('Y-m-d');

    $sql = "UPDATE process SET processStatusID='3' , "
            . "approveDate='$approveDate' , approveBy='$s_userID' "
            . "WHERE processID = $processID";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "ยกเลิกการออกตรวจ " . $processName;
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
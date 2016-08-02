<?php
    include './db/database.php';
    include './session.php';
    
    $pwaBranchID = $_POST['pwaBranchID']; 
    $pwaRegID = $_POST['pwaRegID']; 
    $pwaBranchName = $_POST['pwaBranchName']; 
    $pwaBranchEmail = $_POST['pwaBranchEmail']; 
    $pwaBranchTel = $_POST['pwaBranchTel']; 
    $pwaBranchManager = $_POST['pwaBranchManager'];
    
    $sql = "UPDATE `pwabranch` SET `pwaBranchName`='$pwaBranchName', "
            . "`pwaRegID`='$pwaRegID', `pwaBranchEmail`='$pwaBranchEmail', "
            . "`pwaBranchTel`='$pwaBranchTel', `pwaBranchManager`='$pwaBranchManager' "
            . "WHERE (`pwaBranchID`='$pwaBranchID')";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "แก้ไขข้อมูลหน่วยรับตรวจ " . " " . $pwaBranchName . " อีเมล์ " . $pwaBranchEmail . " โทร. " . $pwaBranchTel . " ผจก.สาขา " . $pwaBranchManager;
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
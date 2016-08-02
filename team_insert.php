<?php
    include './db/database.php';
    include './session.php';
    
    $head = $_POST['head'];  
    $userID = $_POST['userID'];  
    $member_array = $_POST['member'];
    
    
    
        $sql = "INSERT INTO `team` (`head`, `member1`, `member2`, `member3`, `userID`) "
            . "VALUES ('$head', '$member_array[0]', '$member_array[1]', '$member_array[2]', '$userID')";
        $result = mysqli_query($link,$sql);


        $logDate  = date('Y-m-d H:i:s');
        $event = "เพิ่มทีมผู้ตรวจสอบ";
        $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
        
        $sql2="INSERT INTO `log` (`userID`, `userIP`, `logEvent`, `logTypeID`, `logDate`) "
            . "VALUES ('$s_userID', '$ip', '$event', '2', '$logDate')";
        $result2 = mysqli_query($link,$sql2);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
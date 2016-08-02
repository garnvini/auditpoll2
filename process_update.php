<?php
    include './db/database.php';
    include './session.php';
    
    $processID = $_POST['processID']; 
    $processName = $_POST['processName']; 
    $pwaBranchID = $_POST['pwaBranchID'];
    $beginDate = $_POST['beginDate'];
    $finishDate = $_POST['finishDate'];
    
    function trimas($i){
    return $i > 3 ? ( $i > 6 ? ($i > 9 ? '1' : '4') : '3') : '2';
    }
    
    function fiscalYear($m,$y){
        if ($m == 1){
            return $y+544;
        }
        else return $y+543;
    }

    $m = date('n',strtotime($beginDate));
    $y = date('Y',strtotime($beginDate));
    $trimas = trimas($m);
    $fy = fiscalYear($trimas,$y);
    

    $sql = "UPDATE process SET processName='$processName', "
            . "pwaBranchID = '$pwaBranchID', "
            . "beginDate = '$beginDate', finishDate = '$finishDate', "
            . "quarter = '$trimas',  `fiscalYear`='$fy' "
            . "WHERE processID = $processID";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "แก้ไขข้อมูลการออกตรวจ " . " " . $processName;
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
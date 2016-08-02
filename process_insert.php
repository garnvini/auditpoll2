<?php
    include './db/database.php';
    include './session.php';
    
    $processName = $_POST['processName']; 
    $teamID = $_POST['teamID'];
    $beginDate = $_POST['beginDate'];
    $finishDate = $_POST['finishDate'];
    $pwaJobID = $_POST['pwaJobID'];
    $pwaBranchID = $_POST['pwaBranchID'];

    function trimas($i){
    return $i > 3 ? ( $i > 6 ? ($i > 9 ? '1' : '4') : '3') : '2';
    }
    
    function fiscalYear($m,$y){
        if ($m == 1){
            return $y+544;
        }
        else {
            return $y+543;
        }
    }

    $m = date('n',strtotime($beginDate));
    $y = date('Y',strtotime($beginDate));
    $trimas = trimas($m);
    $fy = fiscalYear($trimas,$y);

    
    $sql = "INSERT INTO `process` (`processName`, `teamID`, "
            . "`pwaBranchID`, `beginDate`, "
            . "`finishDate`, `quarter`, `fiscalYear`, `processStatusID`) "
            . " VALUES ('$processName', '$teamID', "
            . "'$pwaBranchID', '$beginDate', "
            . "'$finishDate', '$trimas', '$fy', 1)";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "เพิ่มข้อมูลการออกตรวจ " . $processName;
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
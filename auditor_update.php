<?php
    include './db/database.php';
    include './session.php';
    
    $auditorID = $_POST['auditorID']; 
    $auditorCode = $_POST['auditorCode']; 
    $auditorPre = $_POST['auditorPre']; 
    $auditorName = $_POST['auditorName']; 
    $auditorLastname = $_POST['auditorLastname']; 
    $auditorPosition = $_POST['auditorPosition'];
    $auditorLevel = $_POST['auditorLevel'];
    $partyID = $_POST['party'];
    $divisionID = $_POST['division'];
    $jobID = $_POST['job'];
    
    

    $sql = "UPDATE auditor SET auditorCode='$auditorCode', auditorName='$auditorName', "
            . "auditorPosition = '$auditorPosition',"
            . "auditorLevel = '$auditorLevel', jobID = '$jobID', "
            . "divisionID = '$divisionID', partyID = '$partyID' "
            . "WHERE auditorID = $auditorID";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "แก้ไขข้อมูลผู้ตรวจสอบ " . " " . $auditorName . " " . $auditorLastname;
    $event .= " ตำแหน่ง " . $auditorPosition . " ชั้น " . $auditorLevel;
    $event .= " ฝ่าย " . $partyID . " กอง " . $divisionID . " งาน " . $jobID;
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
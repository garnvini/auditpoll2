<?php
    include './db/database.php';
    include './session.php';
    
    $auditorCode = $_POST['auditorCode']; 
    $auditorPre = $_POST['auditorPre'];
    $auditorName = $_POST['auditorName']; 
    $auditorLastname = $_POST['auditorLastname'];
    $auditorPosition = $_POST['auditorPosition'];
    $auditorLevel = $_POST['auditorLevel'];
    $jobID = $_POST['job'];
    $divisionID = $_POST['division'];
    $partyID = $_POST['party'];
    $auditorOption = $_POST['auditorOption'];
    

    //อัพโหลดภาพประจำตัว
    if (is_uploaded_file($_FILES['auditorPicture']['tmp_name'])){
        $new_picture_name = 'auditor_'.uniqid().".".pathinfo(basename($_FILES['auditorPicture']['name']), PATHINFO_EXTENSION);
        $path_upload = "./assets/img/".$new_picture_name;
        move_uploaded_file($_FILES['auditorPicture']['tmp_name'], $path_upload);
    } else {
        $new_picture_name = "";
    }

    
    $sql = "INSERT INTO `auditor` (`auditorCode`, `auditorPre`, "
            . "`auditorName`,`auditorLastname`,  `auditorPosition`, `auditorPicture`, "
            . "`auditorLevel`, `auditorOption`, `jobID`, `divisionID`, `partyID`) "
            . " VALUES ('$auditorCode', '$auditorPre', '$auditorName', "
            . "'$auditorLastname', '$auditorPosition', '$new_picture_name', "
            . "'$auditorLevel', '$auditorOption', '$jobID', '$divisionID', '$partyID')";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "เพิ่มผู้ตรวจสอบ " . $auditorName . " " . $auditorLastname;
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
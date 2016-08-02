<?php
    include './db/database.php';
    
    $userName = $_POST['userName']; 
    $userPassword = $_POST['userPassword'];
    $userFullname = $_POST['userFullname']; 
    $userLastname = $_POST['userLastname'];
    $userCode = $_POST['userCode'];
    $userTypeID = $_POST['userTypeID'];
    $userEmail = $_POST['userEmail'];
    $userPosition = $_POST['userPosition'];
    $userLevel = $_POST['userLevel'];
    $jobID = $_POST['jobID'];
    
    //เช็ค Username ซ้ำหรือไม่
    $sql_user = "SELECT userName FROM user WHERE userName='$userName'";
    $result_user = mysqli_query($link, $sql_user);
    $is_user = mysqli_num_rows($result_user);
    if ($is_user == 1){
        header('Content-Type: application/json');
        $error = "Username ซ้ำ กรุณาเปลี่ยน Username ใหม่". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        exit();
    }
    
    //เข้ารหัส Password
    $salt = "wefdsfdsfjewifjdskfwefdf";
    $hash_userPassword = hash_hmac('sha256', $userPassword, $salt);
    
    //เช็คเทียบในฐานข้อมูลผู้ตรวจสอบ
    $sql_code = "SELECT auditorID FROM auditor WHERE auditorCode = '$userCode'";
    $result_code = mysqli_query($link, $sql_code);
    $is_code = mysqli_num_rows($result_code);
    if ($is_code == 0){
        header('Content-Type: application/json');
        $error = "กรุณากรอกรหัสพนักงานให้ถูกต้อง". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        exit();
    }
    else{
        while ($row_code = mysqli_fetch_assoc($result_code)) { 
        $auditorID = $row_code['auditorID'];
        }
    }
   
    
    
    //อัพโหลดภาพประจำตัว
    if (is_uploaded_file($_FILES['userPicture']['tmp_name'])){
        $new_picture_name = 'user_'.uniqid().".".pathinfo(basename($_FILES['userPicture']['name']), PATHINFO_EXTENSION);
        $path_upload = "./dist/img/".$new_picture_name;
        move_uploaded_file($_FILES['userPicture']['tmp_name'], $path_upload);
    } else {
        $new_picture_name = "";
    }
    
    $sql = "INSERT INTO `user` (`userPassword`, `userCode`, "
            . "`userName`, `userFullname`, `userLastname`, `userPicture`, "
            . "`userEmail`, `usertypeID`, `userPosition`, `userLevel`, "
            . "`jobID`, `auditorID`) "
            . "VALUES ('$hash_userPassword', '$userCode', '$userName', "
            . "'$userFullname', '$userLastname', '$new_picture_name', "
            . "'$userEmail', '2', '$userPosition', '$userLevel', '$jobID', '$auditorID')";
    
    $result = mysqli_query($link,$sql);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
    
    
    

    

    

    

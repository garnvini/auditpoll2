<?php
    include './db/database.php';
    include './session.php';
    
    $userID = $_POST['userID']; 
    $userName = $_POST['userName']; 
    $userFullname = $_POST['userFullname'];
    $userLastname = $_POST['userLastname'];
    $userPassword = $_POST['userPassword']; 
    $userEmail = $_POST['userEmail'];
    $usertypeID = $_POST['usertypeID'];
    $userPosition = $_POST['userPosition'];
    $userLevel = $_POST['userLevel'];
    $jobID = $_POST['job'];
    
    if (is_uploaded_file($_FILES['userPicture']['tmp_name'])){
        $new_picture_name = 'user_'.uniqid().".".pathinfo(basename($_FILES['userPicture']['name']), PATHINFO_EXTENSION);
        $path_upload = "./assets/users/".$new_picture_name;
        move_uploaded_file($_FILES['userPicture']['tmp_name'], $path_upload);
    } else {
        $new_picture_name = "";
    }
    
    //เข้ารหัส Password
    $salt = "wefdsfdsfjewifjdskfwefdf";
    $hash_userPassword = hash_hmac('sha256', $userPassword, $salt);

    $sql = "UPDATE user SET userName='$userName', userFullname='$userFullname', "
            . "userLastname = '$userLastname', userPassword = '$hash_userPassword', "
            . "userEmail = '$userEmail', usertypeID = '$usertypeID', "
            . "userPicture = '$new_picture_name', "
            . "userPosition = '$userPosition', userLevel = '$userLevel',jobID = '$jobID'"
            . "WHERE userID = $userID";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "แก้ไขข้อมูลส่วนตัวของ " . $userFullname . " " . $userLastname;
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
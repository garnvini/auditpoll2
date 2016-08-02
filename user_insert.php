<?php
    include './db/database.php';
    
    $userName = $_POST['userName']; 
    $userFullname = $_POST['userFullname'];
    $userLastname = $_POST['userLastname'];
    $userPassword = $_POST['userPassword']; 
    $userEmail = $_POST['userEmail'];
    $usertypeID = $_POST['usertypeID'];
    $userPosition = $_POST['userPosition'];
    $userLevel = $_POST['userLevel'];
    $jobID = $_POST['job'];
    
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

    //อัพโหลดภาพประจำตัว
    if (is_uploaded_file($_FILES['userPicture']['tmp_name'])){
        $new_picture_name = 'user_'.uniqid().".".pathinfo(basename($_FILES['userPicture']['name']), PATHINFO_EXTENSION);
        $path_upload = "./assets/users/".$new_picture_name;
        move_uploaded_file($_FILES['userPicture']['tmp_name'], $path_upload);
    } else {
        $new_picture_name = "";
    }
    
    $sql = "INSERT INTO `user` (`userPassword`, `userName`, "
            . "`userFullname`, `userPicture`, "
            . "`userLastname`, `userEmail`, `usertypeID`, `userPosition`, "
            . "`userLevel`, `jobID`) VALUES ('$hash_userPassword', "
            . "'$userName', '$userFullname', '$new_picture_name', '$userLastname', "
            . "'$userEmail', '$usertypeID', '$userPosition', '$userLevel', '$jobID')";
    
    $result = mysqli_query($link,$sql);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
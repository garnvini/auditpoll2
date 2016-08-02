<?php
    include './db/database.php';
    
    $userName = mysqli_real_escape_string($link,$_POST['userName']);
    $userPassword = mysqli_real_escape_string($link,$_POST['userPassword']);
    
    $salt = 'wefdsfdsfjewifjdskfwefdf';
    $hash_login_password = hash_hmac('sha256', $userPassword, $salt);
    
    //เช็คว่ามี User ใน Database
    $sql = "SELECT * FROM user WHERE (userName=? AND userPassword=?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $userName,$hash_login_password);
    //mysqli_stmt_bind_param($stmt, "ss", $userName,$userPassword);
    mysqli_stmt_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);
    if($result_user->num_rows == 1){
        session_start();
        $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
        $_SESSION['userID'] = $row_user['userID'];
        $_SESSION['userName'] = $row_user['userName'];
        $_SESSION['userFullname'] = $row_user['userFullname'];
        $_SESSION['userLastname'] = $row_user['userLastname'];
        $_SESSION['userCode'] = $row_user['userCode'];
        $_SESSION['userPosition'] = $row_user['userPosition'];
        $_SESSION['userPicture'] = $row_user['userPicture'];
        
        $s_userID = $row_user['userID'];
        $logDate  = date('Y-m-d H:i:s');
        $event = "เข้าสู่ระบบ";
        $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
        
        $sql2="INSERT INTO `log` (`userID`, `userIP`, "
                . "`logEvent`, `logTypeID`, `logDate`) "
            . "VALUES ('$s_userID', '$ip', "
                . "'$event', '1', '$logDate')";
        $result = mysqli_query($link,$sql2);
        
    } else {
        header('Content-Type: application/json');
        $errors = "Username หรือ Password ไม่ถูกต้อง" . mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $errors));
    }

    
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    
    
<?php
        session_start();
        if (!isset($_SESSION['userID'])) {
            header("Location: login.php");
        }
        include './db/database.php';
        
        $session_userID= $_SESSION['userID'];
        
        $qry_user = "SELECT * FROM user, usertype "
                . "WHERE userID='$session_userID' "
                . "AND user.usertypeID = usertype.usertypeID";
        $result_user = mysqli_query($link,$qry_user);
        if ($result_user) {
            $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
            
            $s_userID = $row_user['userID'];
            $s_userFullname = $row_user['userFullname'];
            $s_userLastname = $row_user['userLastname'];
            $s_userPicture = $row_user['userPicture'];
            $s_userName = $row_user['userName'];
            $s_userCode = $row_user['userCode'];
            $s_userPosition = $row_user['userPosition'];
            $s_userTypeName = $row_user['usertypeName'];
            $s_userTypeID = $row_user['usertypeID'];
            
            
              
              
            
           

            mysqli_free_result($result_user);
        }
<?php
    include './db/database.php';
    include './session.php';

    $questionaireID = $_POST['questionaireID']; 
    $processID = $_POST['processID']; 
    
    $questionteamID_array = $_POST['questionteamID']; 
    $teamanswer_array = $_POST['teamanswer'];
    
    $questionID1_array = $_POST['questionID1']; 
    $indanswer1_array = $_POST['indanswer1'];     
    $auditorID1 = $_POST['auditorID1']; 
    
    $questionID2_array = $_POST['questionID2']; 
    $indanswer2_array = $_POST['indanswer2'];     
    $auditorID2 = $_POST['auditorID2']; 
    
    $questionID3_array = $_POST['questionID3']; 
    $indanswer3_array = $_POST['indanswer3'];     
    $auditorID3 = $_POST['auditorID3']; 
    
    $questionID4_array = $_POST['questionID4']; 
    $indanswer4_array = $_POST['indanswer4'];     
    $auditorID4 = $_POST['auditorID4']; 
    
    
    function trimas($i){
    return $i > 3 ? ( $i > 6 ? ($i > 9 ? '1' : '4') : '3') : '2';
    }
    
    function fiscalYear($m,$y){
        if ($m == 1){
            return $y+544;
        }
        else {return $y+543;}
    }

    $m = date('m');
    $y = \date('Y');
    $trimas = trimas($m);
    $fy = fiscalYear($trimas,$y);
  
    for ($i=0; $i<count(filter_input_array(INPUT_POST)['teamanswer']); $i++){
        $questionteamID = mysql_real_escape_string($questionteamID_array[$i]);
        $teamanswer = mysql_real_escape_string($teamanswer_array[$i]);
        
        $sql = "INSERT INTO `scoreteam` (`questionID`, `processID`, "
                . "`scorePoint`, `submitDate`, `questionaireID`, "
                . "`quarter`, `fiscalYear`) "
                . "VALUES ('$questionteamID', '$processID', '$teamanswer', "
                . "now(), '$questionaireID', '$trimas', '$fy')";
        $result = mysqli_query($link,$sql);
    }
    
    for ($i=0; $i<count(filter_input_array(INPUT_POST)['indanswer1']); $i++){
        $questionID1 = mysql_real_escape_string($questionID1_array[$i]);
        $indanswer1 = mysql_real_escape_string($indanswer1_array[$i]);
        $sql = "INSERT INTO `scoreperson` (`questionID`, `auditorID`, "
                . "`processID`, `scorePoint`, `questionaireID`, `submitDate`, "
                . "`quarter`, `fiscalYear`) "
                . "VALUES ('$questionID1', '$auditorID1', '$processID', "
                . "'$indanswer1', '$questionaireID', now(), '$trimas', '$fy')";
        $result = mysqli_query($link,$sql);
    }
    
    for ($i=0; $i<count(filter_input_array(INPUT_POST)['indanswer2']); $i++){
        $questionID2 = mysql_real_escape_string($questionID2_array[$i]);
        $indanswer2 = mysql_real_escape_string($indanswer2_array[$i]);
        $sql = "INSERT INTO `scoreperson` (`questionID`, `auditorID`, "
                . "`processID`, `scorePoint`, `questionaireID`, `submitDate`, "
                . "`quarter`, `fiscalYear`) "
                . "VALUES ('$questionID2', '$auditorID2', '$processID', "
                . "'$indanswer2', '$questionaireID', now(), '$trimas', '$fy')";
        $result = mysqli_query($link,$sql);
    }
    
    for ($i=0; $i<count(filter_input_array(INPUT_POST)['indanswer3']); $i++){
        $questionID3 = mysql_real_escape_string($questionID3_array[$i]);
        $indanswer3 = mysql_real_escape_string($indanswer3_array[$i]);
        $sql = "INSERT INTO `scoreperson` (`questionID`, `auditorID`, "
                . "`processID`, `scorePoint`, `questionaireID`, `submitDate`, "
                . "`quarter`, `fiscalYear`) "
                . "VALUES ('$questionID3', '$auditorID3', '$processID', "
                . "'$indanswer3', '$questionaireID', now(), '$trimas', '$fy')";
        $result = mysqli_query($link,$sql);
    }
    
    for ($i=0; $i<count(filter_input_array(INPUT_POST)['indanswer4']); $i++){
        $questionID4 = mysql_real_escape_string($questionID4_array[$i]);
        $indanswer4 = mysql_real_escape_string($indanswer4_array[$i]);
        $sql = "INSERT INTO `scoreperson` (`questionID`, `auditorID`, "
                . "`processID`, `scorePoint`, `questionaireID`, `submitDate`, "
                . "`quarter`, `fiscalYear`) "
                . "VALUES ('$questionID4', '$auditorID4', '$processID', "
                . "'$indanswer4', '$questionaireID', now(), '$trimas', '$fy')";
        $result = mysqli_query($link,$sql);
    }
    
    $sql = "UPDATE process SET processStatusID='4' "
            . "WHERE processID = $processID";
    
    $result = mysqli_query($link,$sql);
    
    $logDate  = date('Y-m-d H:i:s');
    $event = "ส่งแบบประเมิน";
    $ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
        
    $sql2="INSERT INTO `log` (`userID`, `userIP`, `logEvent`, `logTypeID`, `logDate`) "
            . "VALUES ('$s_userID', '$ip', '$event', '3', '$logDate')";
    $result2 = mysqli_query($link,$sql2);
    
    if($result){
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'Thank you for finishing questionaire'));
    }
    else{
        $error = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล". mysqli_error($link);
        echo json_encode(array('status' => 'danger','message' => $error));
        
    }
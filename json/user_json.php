<?php

include '../db/database.php';

$sql = "SELECT usertype.usertypeName, job.jobName, "
        . "`user`.userID, `user`.userName, `user`.userFullname, `user`.userPicture, "
        . "`user`.userLastname, `user`.userEmail, `user`.userPosition, "
        . "`user`.userLevel, `user`.userTypeID, `user`.jobID FROM `user` , "
        . "usertype , job WHERE `user`.userTypeID = usertype.usertypeID AND "
        . "`user`.jobID = job.jobID";

$result = mysqli_query($link, $sql);

$userArray = array();
while ($row = mysqli_fetch_assoc($result)){
    $userArray[] = $row;
    
}

echo json_encode($userArray);
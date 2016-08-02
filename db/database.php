<?php
    $link = mysqli_connect('localhost', 'root', '123456', 'auditpollnew');
    if (mysqli_connect_errno()){
        echo "ไม่สามารถติดต่อฐานข้อมูล MySQL ได้". mysqli_connect_error();
        exit;
    }
    mysqli_set_charset($link, utf8);


<?php
    date_default_timezone_set('Asia/jakarta');
    if(isset($_SESSION))
    {
        include('./header.php');
        session_start();
    }

    $mysqli = new mysqli("localhost","root","","username");
    if($mysqli -> connect_errno)
    {
        echo "failed to connect to MYSQL" . $mysqli -> connect_errno;
        exit();
    }
?>
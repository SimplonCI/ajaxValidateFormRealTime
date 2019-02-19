<?php

    $db = mysqli_connect('localhost','root','','simplon');

    if(!$db){
        die("Mysql connection failed : ".mysqli_connect_error);
    }
?>
<?php

    include_once "../model/class.login.php";

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if(autentica($user,$pass)){
        echo "1";
    }
    else{
        echo "0";
    }


?>
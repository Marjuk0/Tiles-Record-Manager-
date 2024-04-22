<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once ("../models/auth.php");

    /* Processing Registration Form */
    if(isset($_POST['name'])){
        $name = trim(strip_tags($_POST['name']));
        $password = trim(strip_tags($_POST['password']));

        $auth = new auth();
        $result = $auth->register_user($name, $password);
        if($result == 'SUCCESS'){
            header("Location: ../index.php");
        }else{
            header("Location: ../log-in.php");
        }
    }

    /* Processing Login Form */
    if(isset($_POST['username'])){
        $name = trim(strip_tags($_POST['username']));
        $password = trim(strip_tags($_POST['password']));

        $auth = new auth();
        $result = $auth->login_user($name, $password);
        if($result == 'SUCCESS'){
            header("Location: ../index.php");
        } else if ($result == 'INCORRECT_PASS'){
            header("Location: ../log-in.php?msg='Incorrect Password'");
        } else if ($result == 'NOT_EXIST'){
            header("Location: ../log-in.php?msg='No Account Found with this E-mail'");
        } else {

        }
    }

    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: ../log-in.php");
    }



?>
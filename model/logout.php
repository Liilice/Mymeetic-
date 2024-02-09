<?php
    $MyDatabase = require_once("class.php");
    $sessionId = $_COOKIE['session'];
    if($sessionId){
        $session = $MyDatabase->logout($sessionId);
        if($session){
            setcookie('session');
            unset($_COOKIE['session']);
            header("Location: ../index.php");
            exit;
        }
    }
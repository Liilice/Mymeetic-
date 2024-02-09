<?php
    // // $pdo = require_once("database.php");
    $MyDatabase = require_once("class.php");
    $sessionId = $_COOKIE['session'];
    if($sessionId){
        // $statement_logout = $pdo->prepare("SELECT * FROM session WHERE id_session = '$sessionId';");
        // $statement_logout->execute();
        // $session = $statement->fetchAll(PDO::FETCH_ASSOC);
        $session = $MyDatabase->logout($sessionId);
        if($session){
            setcookie('session');
            unset($_COOKIE['session']);
            // unset($_COOKIE['signature']);
            // setcookie('signature', time() - 1);
            header("Location: ../index.php");
            exit;
        }
    }
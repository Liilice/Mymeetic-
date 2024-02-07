<?php
    $pdo = require_once("database.php");
    $sessionId = $_COOKIE['session'];
    if($sessionId){
        $statement = $pdo->prepare("SELECT * FROM session WHERE id_session = '$sessionId';");
        $statement->execute();
        $session = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($session)){
            setcookie('session', time() - 1);
            unset($_COOKIE['session']);
            setcookie('signature', time() - 1);
            unset($_COOKIE['signature']);
            header("Location: /index.php");
            exit;
        }
    }
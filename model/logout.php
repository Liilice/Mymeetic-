<?php
    $pdo = require_once("database.php");
    $sessionId = $_COOKIE['session'];
    if($sessionId){
        $statement_logout = $pdo->prepare("SELECT * FROM session WHERE id_session = '$sessionId';");
        $statement_logout->execute();
        $session = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($session)){
            unset($_COOKIE['session']);
            setcookie('session', time() - 1);
            unset($_COOKIE['signature']);
            setcookie('signature', time() - 1);
            header("Location: ../index.php");
            // exit;
        }
    }
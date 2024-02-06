<?php

function is_login(){
    // $pdo = require_once("database.php");
    global $pdo;
    $session_id = $_COOKIE["session"]?? '';
    if($session_id){
        $statement_session =$pdo->prepare("SELECT id FROM session WHERE id = :id;");
        $statement_session->bindValue(":id", $session_id);
        $statement_session->execute();
        $session = $statement_session->fetchAll(PDO::FETCH_ASSOC);
        if($session){
            $statement_user = $pdo->prepare("SELECT * FROM user WHERE id = :id;");
            $statement_user->bindValue(":id",$session[0]["id_session"]);
            $statement_user->execute();
            $user = $statement_user->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return $user ?? false;
}
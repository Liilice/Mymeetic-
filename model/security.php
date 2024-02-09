<?php

function is_login(): array | false{
    $pdo = require_once("database.php");
    // // global $pdo;
    // $sessionId = $_COOKIE['session'];
    // // $signature = $_COOKIE['signature'];
    // // if($sessionId  && $signature){
    // if($sessionId ){
    // //     $hash = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
    // //     $match = hash_equals($signature, $hash);
    //     // if($match){
    //         $statementSession = $pdo->query("SELECT * FROM session WHERE id_session LIKE '$sessionId';");
    //         $statementSession->execute();
    //         $session = $statementSession->fetchAll(PDO::FETCH_ASSOC);
    //         if(!empty($session)){
    //             $user_id = $session[0]['id_user'];
    //             $statementUser = $pdo->query("SELECT * FROM user JOIN user_loisir ON user.id = user_loisir.id_user WHERE id = $user_id;");
    //             $user = $statementUser->fetchAll(PDO::FETCH_ASSOC);
    //         }
    //     // } 
    // }
    $sessionId = $_COOKIE['session'];
    if($sessionId ){
    //     $hash = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
    //     $match = hash_equals($signature, $hash);
        // if($match){
            $statementSession = $pdo->query("SELECT * FROM session WHERE id_session LIKE '$sessionId';");
            $statementSession->execute();
            $session = $statementSession->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($session)){
                $user_id = $session[0]['id_user'];
                $statementUser = $pdo->query("SELECT * FROM user JOIN user_loisir ON user.id = user_loisir.id_user WHERE id = $user_id;");
                $user = $statementUser->fetchAll(PDO::FETCH_ASSOC);
            }
        // } 
    }
    return $user ?? false;
}
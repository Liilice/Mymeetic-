<?php

$pdo = require_once("database.php");
if(!empty($_POST["email"])&&!empty($_POST["password"])&&!empty($_POST["loisir"])&&!empty($_POST["code_postal"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $loisir = $_POST["loisir"];
    $code_postal = $_POST["code_postal"];
    $sessionId = $_COOKIE['session'];
    if(!empty($email)&&!empty($password)&&!empty($loisir)&&!empty($code_postal)&&!empty($sessionId)){
        $statementCheck = $pdo->query("SELECT * FROM user WHERE email = '$email';");
        $resultat_check = $statementCheck->fetchAll(PDO::FETCH_ASSOC);
        if($resultat_check[0]["email"] == $email){
            echo "Email existe";
            header("Location: ../view/profil.php");
            exit;
        }else{
            $statement = $pdo->query("SELECT id_user FROM session WHERE id_session = '$sessionId';");
            $session_id_user = $statement->fetchAll(PDO::FETCH_ASSOC)[0]["id_user"];
            echo $session_id_user;
            $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
    
            $statement_update_email = $pdo->query("UPDATE user SET email = '$email' WHERE id = $session_id_user;");
            $statement_update_password = $pdo->query("UPDATE user SET password = '$hashedPassword' WHERE id = $session_id_user;");
            $statement_update_password = $pdo->query("UPDATE user SET code_postal = $code_postal WHERE id = $session_id_user;");

            $statement_loisir = $pdo->query("INSERT INTO user_loisir(id_user, name) VALUES($session_id_user, '$loisir');");
            $statementUser = $pdo->query("SELECT * FROM user JOIN user_loisir ON user.id = user_loisir.id_user WHERE id = $session_id_user;");
            $user = $statementUser->fetchAll(PDO::FETCH_ASSOC);
            echo "<pre>";
            print_r($user);
            echo "</pre>";
            foreach($user as $k => $v){
                // foreach($v as $k2 => $v2){
                //     if($k2 == "name"){
                //         echo $user[$k2];
                //     }
                // }
                echo $v;
            }
            // header("Location: ../view/login.php");
            // exit;
        }
}
}

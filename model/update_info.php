<?php
$pdo = require_once("database.php");
if(!empty($_POST["email"])&&!empty($_POST["password"])&&!empty($_POST["loisir"])&&!empty($_POST["code_postal"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $loisir = $_POST["loisir"];
    $code_postal = $_POST["code_postal"];
    $sessionId = $_COOKIE['session'];
    if(!empty($email)&&!empty($password)&&!empty($loisir)&&!empty($code_postal)&&!empty($sessionId)){
        echo $sessionId;
        // $statementCheck = $pdo->query("SELECT * FROM user WHERE email = '$email';");
        // $resultat_check = $statementCheck->fetchAll(PDO::FETCH_ASSOC);
        // if($resultat_check[0]["email"] == $email){
        //     echo "Email existe";
        //     header("Location: ../view/profil.php");
        //     exit;
        // }else{
        //     $statement = $pdo->query("SELECT id_user FROM session WHERE id_session = '$sessionId';");
        //     $session_id_user = $statement->fetchAll(PDO::FETCH_ASSOC)[0]["id_user"];
        //     echo $session_id_user;
        //     $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
    
        //     $statement_update_email = $pdo->query("UPDATE user SET email = '$email' WHERE id = $session_id_user;");
        //     $statement_update_password = $pdo->query("UPDATE user SET password = '$hashedPassword' WHERE id = $session_id_user;");
        //     $statement_update_postal = $pdo->query("UPDATE user SET code_postal = $code_postal WHERE id = $session_id_user;");

        //     $statement_loisir = $pdo->query("INSERT INTO user_loisir(id_user, name) VALUES($session_id_user, '$loisir');");
        //     header("Location: ../view/homepage.php");
        //     exit;
        // }
}
}

<?php
$pdo = require_once("database.php");
const ERROR_PASSWORD = "Mot de passe incorrect";
const ERROR_EMAIL = "Email inexistant";
$error = [
    'email' => '',
    'password' => '',
];
if(!empty($_POST["email"])&&!empty($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo $email;
    if(!empty($email)&&!empty($password)){
        $statement_user = $pdo->query("SELECT * FROM user WHERE email LIKE '$email';") ;
        $user = $statement_user->fetchAll(PDO::FETCH_ASSOC);
        if(empty($user)){
            // $error['email'] = ERROR_EMAIL; 
            header("Location: ../view/login.php");
            exit;
        }else{
            if(password_verify($password, $user[0]["password"])){
                $sessionId = bin2hex(random_bytes(32));
                $statementSession = $pdo->prepare('INSERT INTO session VALUES (
                    :idsession,
                    :iduser
                )');
                $statementSession->bindValue(':idsession', $sessionId);
                $statementSession->bindValue(':iduser', $user[0]['id']);
                $statementSession->execute();
                $signature = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
                setcookie('session',$sessionId, time() + 60 * 60 * 24 * 30, "/", "", false, false);
                setcookie('signature',$signature, time() + 60 * 60 * 24 * 30, "/", "", false, false);
                header('Location: ../view/profil.php');
                exit;
            }else{
                // $error['password'] = ERROR_PASSWORD;
                // $error['email'] = ERROR_EMAIL;
                header("Location: ../view/login.php");
                exit;
            }
        }
    }
}
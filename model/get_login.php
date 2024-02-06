<?php
$pdo = require_once("database.php");
const ERROR_REQUIRED = "Veuillez remplir le champ";
const ERROR_PASSWORD_TOO_SHORT = "Veuillez choisir un mot de passe compris entre 8 et 20 caractères.";
const ERROR_PASSWORD = "Mot de passe incorrect";
const ERROR_EMAIL_INVALID = "Veuillez entrer une email valide";
const ERROR_EMAIL = "Email inexistant";
const ERROR_PASSWORD_CONFIRM = "Mot de passe différent";
$error = [
    'email' => '',
    'password' => '',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);
    $email = $_POST["email"] ?? '';
    $email = $_POST["password"] ?? '';
    if (!$email )  {
        $error['email'] = ERROR_REQUIRED; 
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = ERROR_EMAIL_INVALID; 
    }
    if (!$password)  {
      $error['password'] = ERROR_REQUIRED; 
    }elseif (mb_strlen(($password) > 8 && ($password) <20 )){
      $error['password'] = ERROR_PASSWORD_TOO_SHORT; 
    }
    if (empty(array_filter($error, fn($e)=>$e!== ''))){
        $statement_user = $pdo->query("SELECT * FROM user WHERE email LIKE '$email';") ;
        $user = $statement_user->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
        if(!$user){
            $error['email'] = ERROR_EMAIL; 
        }else{
            if(password_verify($password, $user['password'])){
                $sessionId = bin2hex(random_bytes(32));
                $statementSession = $pdo->prepare('INSERT INTO session VALUES (
                    :idsession,
                    :iduser
                )');
                $statementSession->bindValue(':idsession', $sessionId);
                $statementSession->bindValue(':iduser', $user['id']);
                $statementSession->execute();
                $signature = hash_hmac('sha256', $sessionId, 'chine');
                setcookie('session',$sessionId, time() + 60 * 60 * 24 * 14, "", "", false, true);
                setcookie('signature',$signature, time() + 60 * 60 * 24 * 14, "", "", false, true);
                header('Location: /profil.php');
            }else{
                $error['password'] = ERROR_PASSWORD;
                $error['email'] = ERROR_EMAIL;
            }
        }
    }

}
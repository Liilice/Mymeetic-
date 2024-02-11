<?php
$MyDatabase = require_once("class.php");

if(!empty($_POST["email"])&&!empty($_POST["password"])&&!empty($_POST["loisir"])&&!empty($_POST["code_postal"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $loisir = $_POST["loisir"];
    $code_postal = $_POST["code_postal"];
    $sessionId = $_COOKIE['session'];
    if(!empty($email)&&!empty($password)&&!empty($loisir)&&!empty($code_postal)&&!empty($sessionId)){
        $resultat_check = $MyDatabase->check_email($email);
        if($resultat_check[0]["email"] == $email){
            echo "Email existe";
            header("Location: ../view/profil.php");
            exit;
        }else{
            $session_id = $MyDatabase->get_session_id_user($sessionId);
            $session_id_user = $session_id[0]["id_user"];
            $MyDatabase->update_email($session_id_user, ['email'=>$email]);
            $MyDatabase->update_password($session_id_user, ['password'=>$password]);
            $MyDatabase->update_postal($session_id_user, ['code_postal'=>$code_postal]);
            $MyDatabase->update_loisir($session_id_user, ['loisir'=>$loisir]);
            header("Location: ../view/homepage.php");
            exit;
        }
    }
}

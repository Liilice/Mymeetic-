<?php
$MyDatabase = require_once("class.php");
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
        $user = $MyDatabase->check_email($email);
        if(empty($user)){
            // $error['email'] = ERROR_EMAIL; 
            header("Location: ../view/login.php");
            exit;
        }else{
            if(password_verify($password, $user[0]["password"])){
                $MyDatabase->login($user[0]['id']);
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
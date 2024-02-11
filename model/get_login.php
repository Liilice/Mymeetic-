<?php
$MyDatabase = require_once("class.php");
if(!empty($_POST["email"])&&!empty($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(!empty($email)&&!empty($password)){
        $user = $MyDatabase->check_email($email);
        if(empty($user)){
            header("Location: ../view/error_login.php");
            exit;
        }else{
            if(password_verify($password, $user[0]["password"])){
                $MyDatabase->login($user[0]['id']);
                header('Location: ../view/profil.php');
                exit;
            }else{
                header("Location: ../view/error_login.php");
                exit;
            }
        }
    }
}
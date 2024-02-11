<?php
$MyDatabase = require_once("class.php");
if(!empty($_POST["genre"])&&!empty($_POST["nom"])&&!empty($_POST["prenom"])&&!empty($_POST["email"])&&!empty($_POST["birthdate"])&&!empty($_POST["password"])&&!empty($_POST["loisir"])&&!empty($_POST["code_postal"])){
    $genre = $_POST["genre"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];   
    $email = $_POST["email"];   
    $birthdate = $_POST["birthdate"];
    $password = $_POST["password"];
    $loisir = $_POST["loisir"];     
    $code_postal = $_POST["code_postal"];
    if(!empty($genre)&&!empty($nom)&&!empty($prenom)&&!empty($email)&&!empty($birthdate)&&!empty($password)&&!empty($loisir)&&!empty($code_postal)){
        $resultat_check = $MyDatabase->check_email($email);
        if($resultat_check[0]["email"] == $email){
            header("Location: ../view/error_register_page.php");
            exit;
        }else{
            $MyDatabase->register_user(['email'=>$email,'nom'=>$nom,'prenom'=>$prenom,'genre'=>$genre,'birthdate'=>$birthdate,'password'=>$password,'code_postal'=>$code_postal]);
            $id_user = $MyDatabase->statement_id($email);
            $MyDatabase->register_loisir(['id_user'=>$id_user, 'loisir'=>$loisir]);
            header("Location: ../view/login.php");
            exit;
        }
}
}

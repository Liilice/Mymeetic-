<?php
$pdo = require_once("database.php");
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
        $statementCheck = $pdo->query("SELECT * FROM user WHERE email = '$email';");
        $resultat_check = $statementCheck->fetchAll(PDO::FETCH_ASSOC);
        if($resultat_check[0]["email"] == $email){
            echo "Email existe";
            header("Location: ../view/register.php");
            exit;
        }else{
            $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
            $statement = $pdo->query("INSERT INTO user(email,nom,prenom,date_naissance,genre,password,code_postal) VALUES ('$email', '$nom', '$prenom', '$birthdate', '$genre', '$hashedPassword', $code_postal);");
    
            $statement_id = $pdo->query("SELECT id FROM user WHERE email LIKE '$email';");
            $resultat_id = $statement_id->fetchAll(PDO::FETCH_ASSOC);
            $id_user = $resultat_id[0]["id"];
    
            $statementLoisir = $pdo->query("INSERT INTO user_loisir(id_user, name) VALUES($id_user, '$loisir');");
            header("Location: ../view/login.php");
            exit;
        }
}
}

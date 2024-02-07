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
    
            $statement_id_loisir = $pdo->query("SELECT id FROM loisir WHERE name LIKE '$loisir';");
            $resultat_id_loisir = $statement_id_loisir->fetchAll(PDO::FETCH_ASSOC);
            $id_loisir = $resultat_id_loisir[0]["id"];
    
            $statementLoisir = $pdo->query("INSERT INTO user_loisir(id_user, id_loisir) VALUES($id_user, $id_loisir);");
            header("Location: ../view/login.php");
            exit;
        }
}
}

// if ($_POST["action"] == "login") {
//     print_r($_POST["argument"]);
//     // $_POST = filter_input_array(INPUT_POST, [
//     //     'genre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'birthdate' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     //     'loisir' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
//     // ]);
//     // $genre = $_POST["genre"];
//     // $nom = $_POST["nom"];
//     // $prenom = $_POST["prenom"];
//     // $email = $_POST["email"];
//     // $birthdate = $_POST["birthdate"];
//     // $password = $_POST["password"];
//     // $loisir = $_POST["loisir"];
//     // if(!empty($genre)&&!empty($nom)&&!empty($prenom)&&!empty($email)&&!empty($birthdate)&&!empty($password)&&!empty($loisir)){
//     //     $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
//     //     $statement = $pdo->query("INSERT INTO user(email,nom,prenom,date_naissance,genre,password) VALUES ('$email', '$nom', '$prenom', '$birthdate', '$genre', '$hashedPassword');");

//     //     $statement_id = $pdo->query("SELECT id FROM user WHERE email LIKE '$email';");
//     //     $resultat_id = $statement_id->fetchAll(PDO::FETCH_ASSOC);
//     //     $id_user = $resultat_id[0]["id"];

//     //     $statement_id_loisir = $pdo->query("SELECT id FROM loisir WHERE name LIKE '$loisir';");
//     //     $resultat_id_loisir = $statement_id_loisir->fetchAll(PDO::FETCH_ASSOC);
//     //     $id_loisir = $resultat_id_loisir[0]["id"];
        
//     //     // $statement->bindValue(':email', $email);
//     //     // $statement->bindValue(':nom', $nom);
//     //     // $statement->bindValue(':prenom', $prenom);
//     //     // $statement->bindValue(':birthdate', $birthdate);
//     //     // $statement->bindValue(':genre', $genre);
//     //     // $statement->bindValue(':password', $hashedPassword)

//     //     $statementLoisir = $pdo->query("INSERT INTO user_loisir(id_user, id_loisir) VALUES($id_user, $id_loisir);");
//     //     // header('Location: login.php');
//     // }
    
// }


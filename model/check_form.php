<?php
    const ERROR_REQUIRED = "Veuillez remplir le champ";
    const ERROR_TOO_SHORT = "Le champ est trop court";
    const ERROR_PASSWORD_TOO_SHORT = "Veuillez choisir un mot de passe compris entre 8 et 20 caractères.";
    const ERROR_EMAIL_INVALID = "Veuillez entrer une email valide";
    const ERROR_PASSWORD_CONFIRM = "Mot de passe différent";
    $error = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'birthdate' => '',
        'genre' => '',
        'password' => '',
        'loisirs' => '',
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST = filter_input_array(INPUT_POST, [
            'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'birthdate' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'genre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'loisir[]' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ]);
        $nom = $_POST["nom"]?? '';
        $prenom = $_POST["prenom"]?? '';
        $email = $_POST["email"]?? '';
        $birthdate = $_POST["birthdate"]?? '';
        $genre = $_POST["genre"]?? '';
        $password = $_POST["password"]?? '';
        $loisirs = $_POST["loisir[]"]?? [];  
        var_dump( $_POST["loisir"] ); 
        
        // echo $_POST["loisir"];
        $today = new DateTime();
        $selectedDate = new DateTime($birthdate);
        $age = $today->diff($selectedDate)->format('%y');
        if ($age >= 18) {
            $birthdate = $_POST["birthdate"];
        } else {
            $error['birthdate'] = ERROR_REQUIRED; 
        }
        if (!$birthdate)  {
            $error['birthdate'] = ERROR_REQUIRED; 
        }
        if (!$nom)  {
            $error['nom'] = ERROR_REQUIRED; 
        }elseif (mb_strlen($nom < 2)){
            $error['nom'] = ERROR_TOO_SHORT; 
        }
        if (!$prenom)  {
            $error['prenom'] = ERROR_REQUIRED; 
        }elseif (mb_strlen($prenom < 2)){
            $error['prenom'] = ERROR_TOO_SHORT; 
        }
        if (!$email)  {
            $error['email'] = ERROR_REQUIRED; 
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = ERROR_EMAIL_INVALID; 
        }
        if (!$genre)  {
            $error['genre'] = ERROR_REQUIRED; 
        }
        if (!$password)  {
            $error['password'] = ERROR_REQUIRED; 
        }elseif (mb_strlen(($password) < 8 || ($password) <20 )){
            $error['password'] = ERROR_PASSWORD_TOO_SHORT; 
        }}
        // if (!$loisirs)  {
        //     $error['loisirs'] = ERROR_REQUIRED; 
        // }
        // if (empty(array_filter($error, fn($e)=>$e!== ''))){
        //     $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
        //     $statement = $pdo->query("
        //         INSERT INTO user(email,nom,prenom,date_naissance,genre,password) 
        //         VALUES (':email', ':nom', ':prenom', ':birthdate', ':genre', ':password');");
        //     $statement->bindValue(':email', $email);
        //     $statement->bindValue(':nom', $nom);
        //     $statement->bindValue(':prenom', $prenom);
        //     $statement->bindValue(':birthdate', $birthdate);
        //     $statement->bindValue(':genre', $genre);
        //     $statement->bindValue(':password', $hashedPassword);
        // }    
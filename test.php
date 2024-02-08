<?php 

//         $today = new DateTime();
//         print_r ($today);


            
//     // $genre = $_POST["genre"];
//     // $nom = $_POST["nom"];
//     // $prenom = $_POST["prenom"];
//     // $email = $_POST["email"];
//     // $birthdate = $_POST["birthdate"];
//     // $password = $_POST["password"];
//     // $array_hobbies = $_POST["array_hobbies"]; 
//     // echo $genre.PHP_EOL; 
//     // echo $nom.PHP_EOL; 
//     // echo $prenom.PHP_EOL; 
//     // echo $email.PHP_EOL; 
//     // echo $birthdate.PHP_EOL; 
//     // echo $password.PHP_EOL; 
//     // var_dump( $array_hobbies); 

//     //     var_dump( $_POST["loisir"] ); 
        
//     //     // echo $_POST["loisir"];
//     //     $today = new DateTime();
//     //     $selectedDate = new DateTime($birthdate);
//     //     $age = $today->diff($selectedDate)->format('%y');
//     //     if ($age >= 18) {
//     //         $birthdate = $_POST["birthdate"];
//     //     } else {
//     //         $error['birthdate'] = ERROR_REQUIRED; 
//     //     }
//     //     // if (!$birthdate)  {
//     //     //     $error['birthdate'] = ERROR_REQUIRED; 
//     //     // }
//     //     if (!$nom)  {
//     //         $error['nom'] = ERROR_REQUIRED; 
//     //     }elseif (mb_strlen($nom < 2)){
//     //         $error['nom'] = ERROR_TOO_SHORT; 
//     //     }
//     //     if (!$prenom)  {
//     //         $error['prenom'] = ERROR_REQUIRED; 
//     //     }elseif (mb_strlen($prenom < 2)){
//     //         $error['prenom'] = ERROR_TOO_SHORT; 
//     //     }
//     //     if (!$email)  {
//     //         $error['email'] = ERROR_REQUIRED; 
//     //     }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//     //         $error['email'] = ERROR_EMAIL_INVALID; 
//     //     }
//     //     if (!$genre)  {
//     //         $error['genre'] = ERROR_REQUIRED; 
//     //     }
//     //     if (!$password)  {
//     //         $error['password'] = ERROR_REQUIRED; 
//     //     }elseif (mb_strlen(($password) < 8 || ($password) <20 )){
//     //         $error['password'] = ERROR_PASSWORD_TOO_SHORT; 
//     //     }
//     //     // if (!$loisirs)  {
//     //     //     $error['loisirs'] = ERROR_REQUIRED; 
//     //     // }
//     //     // if (empty(array_filter($error, fn($e)=>$e!== ''))){
//     //     //     $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
//     //     //     $statement = $pdo->query("
//     //     //         INSERT INTO user(email,nom,prenom,date_naissance,genre,password) 
//     //     //         VALUES (':email', ':nom', ':prenom', ':birthdate', ':genre', ':password');");
//     //     //     $statement->bindValue(':email', $email);
//     //     //     $statement->bindValue(':nom', $nom);
//     //     //     $statement->bindValue(':prenom', $prenom);
//     //     //     $statement->bindValue(':birthdate', $birthdate);
//     //     //     $statement->bindValue(':genre', $genre);
//     //     //     $statement->bindValue(':password', $hashedPassword);
//     //     // }    
                 

    
 
$Array = [
    [0=>["id"=>1, "name" => "Badminton"]],
    [0=>["id"=>1, "name" => "Cinema"]],
    [0=>["id"=>1, "name" => "Cuisine"]],
    [0=>["id"=>1, "name" => "Drama"]],
    [0=>["id"=>1, "name" => "Voyager"]]
];
print_r($Array);
foreach($Array as $key => $value){
    foreach($value as $ke => $valu){
        foreach($valu as $k => $v){
            if ($k === "name"){
                echo $v.PHP_EOL;
            }
        }
    }
}
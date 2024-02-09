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

<?php foreach($value as $ke => $valu) :?>
    <?php foreach($valu as $k => $val) :?>
        <?php foreach($val as $k => $v) :?>
            <?php if($k === "name") :?>
                <li>Loisir : <?=$k["name"]?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endforeach; ?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../assets/css/profil.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
    <script><?php include "../assets/js/update_info.js"?></script>
    <title>Document</title>
</head>
<body>
    <main class="container_main">
        <div class="header">
            <h3>
                Account settings
            </h3>
            <ul class="header_ul">
                <li>
                    <a href="./homepage.php">Page d'accueil</a>
                </li>
                <li>
                    <a href="./profil.php">Mon profil</a>
                </li>
                <li>
                    <a href="../model/logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="aside">
            <?php 
                // require_once("../model/security.php");
                // $currentUser = is_login();
            ?>
                <div>
                    <img src="../assets/image/avatar_default.webp" alt="avatar_default">
                    <p><?= $currentUser[0]["nom"] . " ".  $currentUser[0]["prenom"]?></p>
                </div>
                <div class="infos">
                    <h3>Mes informations</h3>
                    <ul>
                        <li>Nom : <?=$currentUser[0]["nom"]?></li>
                        <li>Prenom : <?=$currentUser[0]["prenom"]?></li>
                        <li>Genre : <?=$currentUser[0]["genre"]?></li>
                        <li>Email : <?=$currentUser[0]["email"]?></li>
                        <li>Date de naissance : <?=$currentUser[0]["date_naissance"]?></li>
                        <li>Code Postal : <?=$currentUser[0]["code_postal"]?></li>
                        <li>Loisir :
                            <ul>
                                <?php foreach($currentUser as $key => $value) :?>
                                    <?php foreach($value as $ke => $valu) :?>
                                        <?php if($ke === "name") :?>
                                            <li class="end"><?=$valu?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="center">
                <h3>Update Account</h3>
                <form action="../model/update_info.php" method="POST">
                    <div class="labelInput">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" id="email" >
                    </div>
                    <p class="textError" id="emaill"></p>
                    <div class="labelInput">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="password" id="password"  >
                    </div>
                    <p class="textError" id="mdp"></p>
                    <div class="labelInput">
                        <label for="ville">Code Postal</label>
                        <input type="number" name="code_postal" placeholder="ville" id="code_postal"  >
                    </div>
                    <p class="textError" id="postal"></p>
                    <div class="labelInput">
                        <label for="loisir">Loisir à ajouter </label>
                        <input type="text" name="loisir" placeholder="loisir" id="loisir"  >
                    </div>
                    <p class="textError" id="loisirr"></p>
                    <input type="submit" name="envoyer" class="btn btn-primary" id="submit" value="Update" required>
                    <!-- <button type="button" class="btn btn-primary" id="submit">Update</button> -->
                    <!-- <button type="button" class="btn btn-default">Cancel</button> -->
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?php
$pdo = require_once("../model/database.php");
// // global $pdo;
print_r($_COOKIE);
$sessionId = $_COOKIE['session'];
$signature = $_COOKIE['signature'];
echo $sessionId;
if($sessionId  && $signature){
    $hash = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
    $match = hash_equals($signature, $hash);
    if($match){
        $statementSession = $pdo->query("SELECT * FROM session WHERE id_session LIKE '$sessionId';");
        $statementSession->execute();
        $session = $statementSession->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($session)){
            $user_id = $session[0]['id_user'];
            echo $user_id;
            $statementUser = $pdo->query("SELECT * FROM user JOIN user_loisir ON user.id = user_loisir.id_user WHERE id = $user_id;");
            $user = $statementUser->fetchAll(PDO::FETCH_ASSOC);
            var_dump($user);
        }
    } 
}
?>
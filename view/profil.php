<?php 
    // require_once("../model/security.php");
    // $currentUser = is_login();
    // // print_r($currentUser);
    $sessionId = $_COOKIE['session'];
    $signature = $_COOKIE['signature'];
    echo($sessionId).PHP_EOL;
    echo($signature);
    // var_dump($_COOKIE);
    // if($sessionId  && $signature){
    //     $hash = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
    //     $match = hash_equals($signature, $hash);
    //     if($match){
    //      $statementSession = $pdo->prepare('SELECT * FROM session WHERE id_session = :sessionId');
    //      $statementSession->bindValue(':id_session', $sessionId);
    //      $statementSession->execute();
    //      $session = $statementSession->fetchAll(PDO::FETCH_ASSOC);
    //      if($session){
    //          $statementUser = $pdo->prepare('SELECT * FROM user WHERE id = :id');
    //          $statementUser->bindValue(':id', $session[0]['id_user']);
    //          $statementUser->execute();
    //          $user = $statementUser->fetchAll(PDO::FETCH_ASSOC);
    //      }
    //     } 
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../assets/css/profil.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <a href="/">My meetic</a>
        <ul>
            <li>
                <a href="/">Mon profil</a>
            </li>
            <li>
                <a href="../model/logout.php">Déconnexion</a>
            </li>
        </ul>
    </header>
    <main>
        <aside>
            <div>
                <img src="" alt="">
                <h3></h3>
                <h4></h4>
                <h5></h5>
            </div>
            <div>
                <h2>Mes informations</h2>
                <ul>
                    <li>Nom</li>
                    <li>Prenom</li>
                    <li>Email</li>
                    <li>Date de naissance</li>
                    <li>Ville</li>
                    <li>Mot de passe</li>
                    <li>Ajouter un loisir</li>
                </ul>
            </div>
        </aside>
        <div>
            <form action="">
                <input type="search" name="Genre" id="Genre">
                <input type="search" name="Localisation" id="Localisation">
                <input type="search" name="Loisir" id="Loisir">
                <input type="search" name=" Tranche d’âge" id="age">
                <input type="submit" value="Rechercher" />
            </form>
            <div>
                <p>Afficher les resultat et carroussel</p>
            </div>
        </div>
    </main>
</body>
</html>
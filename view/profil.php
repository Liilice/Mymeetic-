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
                    <a href="/">Mon profil</a>
                </li>
                <li>
                    <a href="../model/logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="aside">
            <?php 
                require_once("../model/security.php");
                $currentUser = is_login();
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
                        <li>Ville</li>
                        <li>Ajouter un loisir</li>
                    </ul>
                </div>
            </div>
            <div class="center">
                <h3>Update Account</h3>
                <form action="">
                    <div class="labelInput">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" id="email" >
                        <p class="textError" id="emaill"></p>
                    </div>
                    <div class="labelInput">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" placeholder="password" id="password"  >
                        <p class="textError" id="mdp"></p>
                    </div>
                    <div class="labelInput">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" placeholder="ville" id="ville"  >
                        <p class="textError" id="villee"></p>
                    </div>
                    <div class="labelInput">
                        <label for="loisir">Loisir à ajouter </label>
                        <input type="text" name="loisir" placeholder="loisir" id="loisir"  >
                        <p class="textError" id="loisir"></p>
                    </div>
                    <button type="button" class="btn btn-primary">Update</button>&nbsp;
                    <button type="button" class="btn btn-default">Cancel</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
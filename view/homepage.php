<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "../assets/css/homepage.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
    <script><?php include "../assets/js/homepage.js"?></script>
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
        <form action="">
            <input type="search" name="Genre" id="Genre">
            <input type="search" name="Localisation" id="Localisation">
            <input type="search" name="Loisir" id="Loisir">
            <input type="search" name=" Tranche d’âge" id="age">
            <input type="submit" name="envoyer" class="btn" id="submit" value="Rechercher" required>
        </form>
    </main>
</body>
</html>
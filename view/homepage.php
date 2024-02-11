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
        <form action="../model/match.php" method="POST" id="search_form">
            <input type="search" name="genre" id="genre" placeholder="genre">
            <input type="search" name="localisation" id="localisation" placeholder="localisation">
            <input type="search" name="loisir" id="loisir" placeholder="loisir">
            <input type="search" name="age" id="age" placeholder="age">
            <input type="submit" name="envoyer" class="btn" id="submit" value="Rechercher" required>
        </form>
        <div class="carousel">
            <div class="carousel-container"></div>
            <button class="prev btn">Précédent</button>
            <button class="next btn">Suivant</button>
        </div>
    </main>
</body>
</html>

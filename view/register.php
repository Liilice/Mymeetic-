<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "./assets/css/register.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script><?php include "./assets/js/register.js" ?></script>
    <title>Document</title>
</head>
<body>
    <form action="./view/login.php" method="POST">
        <h1>Inscrivez-vous dès maintenant !</h1>
        <div class="labelInput">
            <label for="genre">Genre</label><br />
            <div class="containerGenre">
                <input type="radio" name="genre" value="Homme" id="Homme" class="genre"  />
                <label for="Homme">Homme</label><br />
                <input type="radio" name="genre" value="Femme" id="Femme" class="genre"  />
                <label for="Femme">Femme</label><br />
                <input type="radio" name="genre" value="Autre" id="Autre" class="genre"  />
                <label for="Autre">Autre</label><br />
            </div>
            <p class="textError" id="genre"></p>
        </div>
        <div class="labelInput">
            <label for="nom">Nom</label>
            <input type="text" name="nom" placeholder="Nom" id="nom">
            <p class="textError" id="name"></p>
        </div>
        <div class="labelInput">
            <label for="Prenom">Prenom</label>
            <input type="text" name="prenom" placeholder="Prenom" id="prenom" >
            <p class="textError" id="prenomm"></p>
        </div>
        <div class="labelInput">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" id="email" >
            <p class="textError" id="emaill"></p>
        </div>
        <div class="labelInput">
            <label for="birthdate">Date de naissance</label>
            <input type="date" name="birthdate" id="birthday"> 
            <p class="textError" id="birthdate"></p>
        </div>
        <div class="labelInput">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="password" id="password"  >
            <p class="textError" id="mdp"></p>
        </div>
        <div class="labelInput">
            <label for="loisirs">Loisirs</label>
            <select name="loisir" id="loisir" class="containerGenre">
                <option value="Sport">Sport</option>
                <option value="Lecture">Lecture</option>
                <option value="Informatique">Informatique</option>
                <option value="Jeux vidéo">Jeux vidéo</option>
                <option value="Cinema">Cinema</option>
                <option value="Cuisine">Cuisine</option>
            </select>
            <!-- <p class="textError" id="loisirs"></p> -->
        </div>
        <input type="submit" name="envoyer" class="btn btn-danger" id="submit" value="S'inscrire" required>
        <!-- <button class="btn btn-danger">S'inscrire</button> -->
    </form>
</body>
</html>
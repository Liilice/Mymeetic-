<DOCTYPE html>
  <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style><?php include "../assets/css/login.css" ?></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script><?php include "../assets/js/login.js" ?></script>
        <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
      <form action="../model/get_login.php" method="POST">
        <h1>Se connecter</h1>
        <div class="social-container">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-google-plus-g"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <input type="email" placeholder="Email" name="email" id="email" required/>
        <p class="textError" id="emaill"></p>
        <?= $error['email'] ? '<p class="textError">' . $error['email'] . '</p>' : "" ?>
        <input type="password" name="password" placeholder="Mot de passe" id="password" required/>
        <p class="textError" id="mdp"></p>
        <a href="./view/login.php">Créer un compte</a>
        <input type="submit" name="envoyer" class="btn" id="submit" value="Se connecter" required>
        <p id="erreur"></p>
      </form>
    </body>
  </html>
</DOCTYPE>
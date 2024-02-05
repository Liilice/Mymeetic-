<DOCTYPE html>
  <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style><?php include "../assets/css/login.css" ?></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script><?php include "../assets/js/login.js" ?></script>
        <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="form-container login-container">
          <form action="#" method="POST" id="login">
            <h1>Se connecter</h1>
            <div class="social-container">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-google-plus-g"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <input type="email" placeholder="Email" id="email" />
            <?= $error['email'] ? '<p class="textError">' . $error['email'] . '</p>' : "" ?>
            <!-- <p class="textError" id="emaill"></p> -->
            <input type="password" id="password" placeholder="Mot de passe" id="mdp" />
            <?= $error['password'] ? '<p class="textError">' . $error['password'] . '</p>' : "" ?>
            <!-- <p class="textError" id="mdp"></p> -->
            <a href="register.php">Créer un compte</a>
            <button type="button" class="btn">Se connecter</button>
            <p id="erreur"></p>
          </form>
        </div>
    </body>
  </html>
</DOCTYPE>
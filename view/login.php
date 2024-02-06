<?php
echo "hello";
$pdo = require_once("../model/database.php");
const ERROR_REQUIRED = "Veuillez remplir le champ";
const ERROR_PASSWORD_TOO_SHORT = "Veuillez choisir un mot de passe compris entre 8 et 20 caractères.";
const ERROR_PASSWORD = "Mot de passe incorrect";
const ERROR_EMAIL_INVALID = "Veuillez entrer une email valide";
const ERROR_EMAIL = "Email inexistant";
const ERROR_PASSWORD_CONFIRM = "Mot de passe différent";
$error = [
    'email' => '',
    'password' => '',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo "if";
    $_POST = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);
    $email = $_POST["email"];
    $email = $_POST["password"];
    if (!$email )  {
        $error['email'] = ERROR_REQUIRED; 
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = ERROR_EMAIL_INVALID; 
    }
    if (!$password)  {
      $error['password'] = ERROR_REQUIRED; 
    }elseif (mb_strlen(($password) > 8 && ($password) <20 )){
      $error['password'] = ERROR_PASSWORD_TOO_SHORT; 
    }
    if (empty(array_filter($error, fn($e)=>$e!== ''))){
        $statement_user = $pdo->query("SELECT * FROM user WHERE email LIKE '$email';") ;
        $user = $statement_user->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
        if(!$user){
            $error['email'] = ERROR_EMAIL; 
        }else{
            if(password_verify($password, $user['password'])){
                $sessionId = bin2hex(random_bytes(32));
                $statementSession = $pdo->prepare('INSERT INTO session VALUES (
                    :idsession,
                    :iduser
                )');
                $statementSession->bindValue(':idsession', $sessionId);
                $statementSession->bindValue(':iduser', $user['id']);
                $statementSession->execute();
                $signature = hash_hmac('sha256', $sessionId, 'chine');
                setcookie('session',$sessionId, time() + 60 * 60 * 24 * 14, "", "", false, true);
                setcookie('signature',$signature, time() + 60 * 60 * 24 * 14, "", "", false, true);
                header('Location: /profil.php');
            }else{
                $error['password'] = ERROR_PASSWORD;
                $error['email'] = ERROR_EMAIL;
            }
        }
    }

}
?>
<DOCTYPE html>
  <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style><?php include "./assets/css/login.css" ?></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/96249701bf.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <form action="" method="POST">
        <h1>Se connecter</h1>
        <div class="social-container">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-google-plus-g"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <input type="email" placeholder="Email" name="email" />
        <?= $error['email'] ? '<p class="textError">' . $error['email'] . '</p>' : "" ?>
        <!-- <p class="textError" id="emaill"></p> -->
        <input type="password" name="password" placeholder="Mot de passe" id="mdp" />
        <?= $error['password'] ? '<p class="textError">' . $error['password'] . '</p>' : "" ?>
        <!-- <p class="textError" id="mdp"></p> -->
        <a href="register.php">Créer un compte</a>
        <button type="button" class="btn">Se connecter</button>
        <p id="erreur"></p>
      </form>
    </body>
  </html>
</DOCTYPE>
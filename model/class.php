<?php
$pdo = require_once("database.php");
class MyDatabase {
    // private $dsn = 'mysql:host=localhost;dbname=mymeetic';
    // $user = 'alice';
    // $password = 'AliceZheng';
    // try{
    //     $pdo = new PDO($dsn, $user, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     // echo "Connexion reussi\n";
    // }catch(PDOException $e){
    //     echo "Erreur : ".$e->getMessage();
    // }
    
    private PDOStatement $statementCheck;
    private PDOStatement $statement_create_user;
    private PDOStatement $statement_id;
    private PDOStatement $statementLoisir;

    private PDOStatement $statement_user;
    private PDOStatement $statementSession;

    private PDOStatement $statement_logout;

    private PDOStatement $statement_update_info;
    private PDOStatement $statement_update_email;
    private PDOStatement $statement_update_password;
    private PDOStatement $statement_update_postal;
    private PDOStatement $statement_loisir;

    function __construct(private PDO $pdo)
    {
        $this->statementCheck = $pdo->prepare("SELECT * FROM user WHERE email = :email;");
        $this->statement_create_user = $pdo->prepare("
            INSERT INTO user(email,nom,prenom,date_naissance,genre,password,code_postal) 
            VALUES (:email, :nom, :prenom, :birthdate, :genre, :hashedPassword, :code_postal);");
        $this->statement_id = $pdo->prepare("SELECT id FROM user WHERE email LIKE :email;");
        $this->statementLoisir = $pdo->prepare("INSERT INTO user_loisir(id_user, name) VALUES(:id_user, :loisir);");
        
        $this->statement_user = $pdo->prepare("SELECT * FROM user WHERE email LIKE :email;") ;     
        $this->statementSession = $pdo->prepare('INSERT INTO session VALUES (:idsession, :iduser)');      

        $this->statement_logout = $pdo->prepare("SELECT * FROM session WHERE id_session = :sessionId;");

        $this->statement_update_info = $pdo->prepare("SELECT id_user FROM session WHERE id_session = :sessionId;");
        $this->statement_update_email = $pdo->prepare("UPDATE user SET email = :email WHERE id = :session_id_user;");
        $this->statement_update_password = $pdo->prepare("UPDATE user SET password = :hashedPassword WHERE id = :session_id_user;");
        $this->statement_update_postal = $pdo->prepare("UPDATE user SET code_postal = :code_postal WHERE id = :session_id_user;");
        $this->statement_loisir = $pdo->prepare("INSERT INTO user_loisir(id_user, name) VALUES(:session_id_user, :loisir);");
    }
    public function check_email($email)
    {
        $this->statementCheck->bindValue(':email', $email);
        $this->statementCheck->execute();
        return $this->statementCheck->fetchAll(PDO::FETCH_ASSOC);
    }
    public function register_user($user)
    {
        $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
        $this->statement_create_user->bindValue(':email', $user['email']);
        $this->statement_create_user->bindValue(':nom', $user['nom']);
        $this->statement_create_user->bindValue(':prenom', $user['prenom']);
        $this->statement_create_user->bindValue(':birthdate', $user['birthdate']);
        $this->statement_create_user->bindValue(':genre', $user['genre']);
        $this->statement_create_user->bindValue(':hashedPassword', $hashedPassword);
        $this->statement_create_user->bindValue(':code_postal', $user['code_postal']);
        $this->statement_create_user->execute();
        return;
    }
    public function statement_id($email)
    {
        $this->statement_id->bindValue(':email', $email);
        $this->statement_id->execute();
        return $this->statement_id->fetchAll(PDO::FETCH_ASSOC)[0]["id"];
    }
    public function register_loisir($loisir)
    {
        $this->statementLoisir->bindValue(':id_user', $loisir['id_user']);
        $this->statementLoisir->bindValue(':loisir', $loisir['loisir']);
        $this->statementLoisir->execute();
        return;
    }

}
return new MyDatabase($pdo);
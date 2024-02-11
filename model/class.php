<?php
$pdo = require_once("database.php");
class MyDatabase {
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
    private PDOStatement $statement_update_loisir;

    function __construct(private PDO $pdo)
    {
        $this->statementCheck = $pdo->prepare("SELECT * FROM user WHERE email = :email;");
        $this->statement_create_user = $pdo->prepare("
            INSERT INTO user(email,nom,prenom,date_naissance,genre,password,code_postal) 
            VALUES (:email, :nom, :prenom, :birthdate, :genre, :hashedPassword, :code_postal);");
        $this->statement_id = $pdo->prepare("SELECT id FROM user WHERE email LIKE :email;");
        $this->statementLoisir = $pdo->prepare("INSERT INTO user_loisir(id_user, name) VALUES(:id_user, :loisir);");
        
        // $this->statement_user = $pdo->prepare("SELECT * FROM user WHERE email LIKE :email;") ;     
        $this->statementSession = $pdo->prepare("INSERT INTO session VALUES (DEFAULT, :iduser);");      

        $this->statement_logout = $pdo->prepare("SELECT * FROM session WHERE id_session = :sessionId;");

        $this->statement_update_info = $pdo->prepare("SELECT id_user FROM session WHERE id_session = :sessionId;");
        $this->statement_update_email = $pdo->prepare("UPDATE user SET email = :email WHERE id = :session_id_user;");
        $this->statement_update_password = $pdo->prepare("UPDATE user SET password = :hashedPassword WHERE id = :session_id_user;");
        $this->statement_update_postal = $pdo->prepare("UPDATE user SET code_postal = :code_postal WHERE id = :session_id_user;");
        $this->statement_update_loisir = $pdo->prepare("UPDATE user_loisir SET name = :loisir WHERE id_user = :session_id_user");

        // $this->statement_loisir = $pdo->prepare("INSERT INTO user_loisir(id_user, name) VALUES(:session_id_user, :loisir);");
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
    public function login($user)
    {
        $this->statementSession->bindValue(':iduser', $user);
        $this->statementSession->execute();
        $sessionId = $this->pdo->lastInsertId();
        // $signature = hash_hmac('sha256', $sessionId, 'xiao long bao hao chi');
        setcookie('session',$sessionId, time() + 60 * 60 * 24 * 30, "/", "", false, true);
        // setcookie('signature',$signature, time() + 60 * 60 * 24 * 30, "/", "", false, false);
        return;
    }
    public function logout($sessionId)
    {
        $this->statement_logout->bindValue(':sessionId', $sessionId);   
        $this->statement_logout->execute();
        return $this->statement_logout->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_session_id_user($sessionId)
    {
        $this->statement_update_info->bindValue(':sessionId', $sessionId);   
        $this->statement_update_info->execute();
        return $this->statement_update_info->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_email($session_id_user, $user)
    {
        $this->statement_update_email->bindValue(':email', $user['email']);   
        $this->statement_update_email->bindValue(':session_id_user', $session_id_user);   
        $this->statement_update_email->execute();
        return;
    }
    public function update_password($session_id_user, $user)
    {
        $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2ID);
        $this->statement_update_password->bindValue(':hashedPassword', $hashedPassword);   
        $this->statement_update_password->bindValue(':session_id_user', $session_id_user);   
        $this->statement_update_password->execute();
        return;
    }
    public function update_postal($session_id_user, $user)
    {
        $this->statement_update_postal->bindValue(':code_postal', $user['code_postal']);   
        $this->statement_update_postal->bindValue(':session_id_user', $session_id_user);   
        $this->statement_update_postal->execute();
        return;
    }
    public function update_loisir($session_id_user, $user)
    {
        $this->statement_update_loisir->bindValue(':loisir', $user['loisir']);   
        $this->statement_update_loisir->bindValue(':session_id_user', $session_id_user);   
        $this->statement_update_loisir->execute();
        return;
    }
}
return new MyDatabase($pdo);
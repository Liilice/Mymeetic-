<?php
$pdo = require_once("database.php");
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$localisation = isset($_GET['localisation']) ? $_GET['localisation'] : '';
$loisir = isset($_GET['loisir']) ? $_GET['loisir'] : '';
$age = isset($_GET['age']);
if($age){
    $statement_filter = $pdo->query("
    SELECT * FROM user 
    JOIN user_loisir ON user.id = user_loisir.id_user
    WHERE user.genre LIKE '%$genre%'
    AND user.code_postal LIKE '$localisation%'
    AND user_loisir.name LIKE '%$loisir%'
    AND (TIMESTAMPDIFF(YEAR, date_naissance, CURDATE()) >= $age);");
}else{
    $statement_filter = $pdo->query("
    SELECT * FROM user 
    JOIN user_loisir ON user.id = user_loisir.id_user
    WHERE user.genre LIKE '%$genre%'
    AND user.code_postal LIKE '$localisation%'
    AND user_loisir.name LIKE '%$loisir%';");
}
$resultat = $statement_filter->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($resultat); 

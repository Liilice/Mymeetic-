<?php
    $pdo = require_once("database.php");
    $statementLoisir = $pdo->query("SELECT name FROM loisir ORDER BY id ASC");
    $loisirArray = $statementLoisir->fetchAll(PDO::FETCH_ASSOC);

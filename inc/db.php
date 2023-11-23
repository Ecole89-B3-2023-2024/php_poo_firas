<?php

$dsn = "mysql:dbname=test_pdo;host=localhost;charset=utf8";
$username = "root";
$password = "";

// on essaie de se connecter et on prévoit un traitement alternatif en cas d'échec
try {
    $pdo = new PDO($dsn, $username, $password);
} catch(Exception $erreur) {
    echo "<h1>Erreur de connection à la bdd</h1>";
    var_dump($erreur);
    exit();
}
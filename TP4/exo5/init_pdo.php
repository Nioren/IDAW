<?php
    define('DB_HOST','127.0.0.1');
    define('DB_NAME','dbtest');
    define('DB_USER','root');
    define('DB_PASSWORD','');
try {
    $pdo = new PDO("mysql:host=" . DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
?>
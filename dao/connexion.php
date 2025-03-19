<?php 

//Inclusion du fichier config.php
require_once __DIR__.'/../config.php';

try {
    // Création de la connexion PDO
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, on affiche un message et on arrête le script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
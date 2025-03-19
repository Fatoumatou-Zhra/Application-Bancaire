<?php
// --- Configuration de la base de données ---
$host     = 'localhost';
$dbname   = 'banque';
$username = 'root';
$password = '';
$charset  = 'utf8mb4';

// Construction du DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Options pour PDO : 
// - Lancer des exceptions en cas d'erreur
// - Récupérer les résultats sous forme de tableaux associatifs
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
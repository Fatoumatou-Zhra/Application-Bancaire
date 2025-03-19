<?php
// --- Récupération des recettes depuis la base ---
$sql = "SELECT * FROM client";
//query($sql) est une méthode de la classe $pdo
$stmt = $pdo->query($sql);
$clients = $stmt->fetchAll();
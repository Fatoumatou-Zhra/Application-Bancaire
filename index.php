<?php

session_start();
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/CompteController.php';

$clientController = new ClientController();
$adminController = new AdminController();

if (!isset($_SESSION['username'])) {
    $adminController->index();
}

if (isset($_GET['action']) && $_GET['action'] == 'create' && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['email'])&& isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse'])) {
    $clientController->createClient($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse']);
} if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse']) ) {
    $clientController->updateClient($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse']);
} elseif (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'supprimer') {
    $clientController->deleteClient($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'voir') {
    $clientController->viewClient($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'modifier') {
    $clientController->modifyClient($_GET['id']);
} elseif (isset($_GET['page']) && $_GET['page'] === 'new-client') {
    $clientController->newClient();
} elseif (isset($_GET['page']) && $_GET['page'] === 'login') {
    $adminController->index();
} elseif (isset($_GET['action']) && $_GET['action'] === 'connexion' && isset($_POST['username']) && isset($_POST['password'])) {
    $adminController->connect($_POST['username'], $_POST['password']);
} elseif (isset($_GET['action']) && $_GET['action'] === 'disconnect') {
       $adminController->disconnect();
} else {
    $clientController->listAllClients();
}

$compteController = new CompteController();

if (isset($_GET['action']) && $_GET['action'] == 'create' && isset($_POST['rib']) && !empty($_POST['rib']) && isset($_POST['solde']) && !empty($_POST['solde']) && isset($_POST['type_compte']) && !empty($_POST['type_compte'])&& isset($_POST['id_client']) && !empty($_POST['id_client'])) {
    $compteController->createCompte($_POST['rib'], $_POST['solde'], $_POST['typpe_compte'], $_POST['id_client']);
} if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_POST['rib']) && !empty($_POST['rib']) && isset($_POST['solde']) && !empty($_POST['solde']) && isset($_POST['type_compte']) && !empty($_POST['type_compte']) && isset($_POST['id_client']) && !empty($_POST['id_client'])){
    $compteController->updateCompte($_POST['id'], $_POST['solde'], $_POST['rib'], $_POST['type_compte'], $_POST['id_client']);
} elseif (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'supprimer'){
    $compteController->deleteCompte($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'voir'){
    $compteController->viewCompte($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'modifier'){
    $compteController->modifyCompte($_GET['id']);
} elseif (isset($_GET['page']) && $_GET['page'] === 'new-compte'){
    $compteController->newCompte();
} elseif (isset($_GET['page']) && $_GET['page'] === 'login'){
    $adminController->index();
} elseif (isset($_GET['action']) && $_GET['action'] === 'connexion' && isset($_POST['username']) && isset($_POST['password'])){
    $adminController->connect($_POST['username'], $_POST['password']);
} elseif (isset($_GET['action']) && $_GET['action'] === 'disconnect'){
    $adminController->disconnect();
} else {
    $compteController->listAllComptes();
}
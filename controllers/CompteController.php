<?php

require_once __DIR__ . '/../model/comptes.php';
require_once __DIR__ . '/../model/clients.php'; 

class CompteController{
    private $compteModel;
    private $clientModel;

    public function __construct(){
        $this->compteModel = new Compte();
        $this->clientModel = new Client(); 
    }

    public function newCompte(){
        $clients = $this->clientModel->getAllClients(); 
        require_once __DIR__ . '/../views/new-compte.php';
    }

    public function listAllComptes(){
        $comptes = $this->compteModel->getAllComptes();
        require_once __DIR__ . '/../views/liste-comptes.php';
    }

    public function viewCompte($id){
        $compte = $this->compteModel->getCompte($id);
        require_once __DIR__ . '/../views/view-compte.php';
    }

    public function modifyCompte($id){
        $compte = $this->compteModel->getCompte($id);
        $clients = $this->clientModel->getAllClients(); 
        require_once __DIR__ . '/../views/modify-compte.php';
    }

    public function deleteCompte($id){
        $this->compteModel->deleteCompte($id);
        header('Location: index.php');
    }

    public function createCompte(float $solde, string $rib, string $type_compte, int $client){
        $this->compteModel->create($solde, $rib, $type_compte, $client);
        header('Location: index.php');
    }

    public function updateCompte(int $id, float $solde, string $rib, string $type_compte, int $client){
        $this->compteModel->update($id, $solde, $rib, $type_compte, $client); 
        header('Location: index.php');
    }
}

<?php

require_once __DIR__ . '/../model/clients.php';

class ClientController{
    private $clientModel;
    
    public function __construct(){
        $this->clientModel = new Client();
    }

    public function newClient(){
        require_once __DIR__ . '/../views/new-client.php';
    }

    public function listAllClients(){
        $clients = $this->clientModel->getAllClients();
        require_once __DIR__ . '/../views/liste-clients.php';
    }

    public function viewClient($id){
        $client = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/view-client.php';
    }

    public function modifyClient($id){
        $client = $this->clientModel->getClient($id);
        require_once __DIR__ . '/../views/modify-client.php';
    }

    public function deleteClient($id){
        $this->clientModel->deleteClient($id);
        header('Location: index.php');
    }

    public function createClient(string $nom, string $prenom, string $email, string $telephone, $adresse){
        $this->clientModel->create($nom, $prenom, $email, $telephone, $adresse);
        header('Location: index.php');
    }

    public function updateClient(string $id, string $nom, string $prenom, string $email, string $telephone, string $adresse){
        $this->clientModel->update($id, $nom, $prenom, $email, $telephone, $adresse);
        header('Location: index.php');
    }
}
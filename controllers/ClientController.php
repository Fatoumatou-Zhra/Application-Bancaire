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

    public function deleteClient($id) {
        if ($this->clientModel->hasCompte($id)) {
            echo "<script>
                    alert('❌ Impossible de supprimer ce client car il possède un compte.');
                    window.history.back();
                  </script>";
            exit; // Arrête l'exécution pour éviter toute suppression
        }
    
        $this->clientModel->deleteClient($id);
        echo "<script>
                alert('✅ Client supprimé avec succès.');
                window.location.href = 'index.php';
              </script>";
        exit;
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
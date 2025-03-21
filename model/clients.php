<?php

require_once __DIR__ . '/../dao/connexion.php';

class Client{
    private $pdo;

    public function __construct(){
        $this->pdo = getConnexion();
    }

    public function getAllClients(){
        $sql = "SELECT * FROM client";
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function deleteClient($id){
        $sqlDelete = "DELETE FROM client WHERE id=:id";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function hasCompte($id_client) {
        $sql = "SELECT id FROM compte WHERE id_client = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_client]);
        return $stmt->fetch() ? true : false;
    }  

    public function getCLient($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create(string $nom, string $prenom, string $email, string $telephone, string $adresse){
        $stmt = $this->pdo->prepare("INSERT INTO client (nom, prenom, email, telephone, adresse) VALUES (:nom, :prenom, :email, :telephone, :adresse);");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        
        return $stmt->execute();
    }

    public function update(string $id, string $nom, string $prenom, string $email, string $telephone, string $adresse) {
        $stmt = $this->pdo->prepare("UPDATE client SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, adresse = :adresse WHERE id=:id;");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':adresse', $adresse);     

            return $stmt->execute();
    }
}
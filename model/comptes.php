<?php

require_once __DIR__ . '/../dao/connexion.php';

class Compte{
    private $pdo;

    public function __construct(){
        $this->pdo = getConnexion();
    }

    public function getAllComptes(){
        $sql = "SELECT compte.id, compte.rib, compte.solde, compte.type_compte, client.nom, client.prenom 
                FROM compte INNER JOIN client ON compte.id_client = client.id";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteCompte($id){
        $sqlDelete = "DELETE FROM compte WHERE id=:id";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getCompte($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM compte WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create(float $solde, string $rib, string $type_compte){
        $stmt = $this->pdo->prepare("INSERT INTO compte (solde, rib, type_compte) VALUES (:solde, :rib, :type_compte);");
        $stmt->bindParam(':solde', $solde);
        $stmt->bindParam(':rib', $rib);
        $stmt->bindParam(':type_compte', $type_compte);
        
        return $stmt->execute();
    }

    public function update(int $id, float $solde, string $rib, string $type_compte) {
        $stmt = $this->pdo->prepare("UPDATE compte SET solde = :solde, rib = :rib, type_compte = :type_compte WHERE id=:id;");
        $stmt->bindParam(':solde', $solde);
        $stmt->bindParam(':rib', $rib);
        $stmt->bindParam(':type_compte', $type_compte);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }    
}
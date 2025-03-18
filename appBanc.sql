--Création de la base de donnée 
CREATE DATABASE banque; 

--Création de la table administrateur
CREATE TABLE administrateur(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL
);

--Création de la table client 
CREATE TABLE client(
    num_client INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(55) NOT NULL,
    adresse VARCHAR(255)
);

--Création de la table compte 
CREATE TABLE compte(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    num_client INT NOT NULL,
    rib VARCHAR(100) NOT NULL, 
    type_compte ENUM('Courant','Epargne') NOT NULL,
    solde DECIMAL NOT NULL,
    FOREIGN KEY (num_client) REFERENCES client(num_client)
);

--Création de la table contrat 
CREATE TABLE contrat(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    num_client INT NOT NULL,
    type_contrat ENUM('Assurance vie','Assurance Habitation','Credit Immobilier','Credit a la consommation','Compte epargne logement') NOT NULL,
    montant DECIMAL NOT NULL,
    duree VARCHAR(50) NOT NULL,
    FOREIGN KEY (num_client) REFERENCES client(num_client)
);

-- Insértion de données dans la table administrateur
INSERT INTO administrateur (email, mdp) VALUES
('jean.dupont@example.com', 'admin123'),
('sophie.martin@example.com', 'securePass'),
('paul.durand@example.com', 'password123');

-- Insértion de données dans la table client
INSERT INTO client (nom, prenom, email, telephone, adresse) VALUES
('Dupont', 'Alice', 'alice.lemoine@example.com', '0612345678', '10 rue de Paris, 75001 Paris'),
('Bernard', 'Luc', 'luc.bernard@example.com', '0622334455', '15 avenue des Champs, 75008 Paris'),
('Morel', 'Emma', 'emma.morel@example.com', '0633445566', '25 boulevard Haussmann, 75009 Paris');

-- Insértion de données dans la table compte
INSERT INTO compte (num_client, rib, type_compte, solde) VALUES
(1, 'FR7612345678901234567890123', 'Courant', 1500.50),
(1, 'FR7698765432109876543210987', 'Epargne', 5000.75),
(2, 'FR7611122233344455566677788', 'Courant', 250.00),
(3, 'FR7622233344455566677788999', 'Epargne', 10000.25);

-- Insértion de données dans la table contrat
INSERT INTO contrat (num_client, type_contrat, montant, duree) VALUES
(1, 'Assurance vie', 50000, '120'),
(1, 'Credit Immobilier', 150000, '240'),
(2, 'Assurance Habitation', 200, '12'),
(3, 'Credit a la consommation', 5000, '36'),
(3, 'Compte epargne logement', 10000, '60');

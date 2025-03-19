--Création de la base de donnée 
CREATE DATABASE banque; 

--Création de la table administrateur
CREATE TABLE administrateur(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    user VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL
);

--Création de la table client 
CREATE TABLE client(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    adresse VARCHAR(255)
);

--Création de la table compte 
CREATE TABLE compte(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_client INT NOT NULL,
    rib VARCHAR(100) NOT NULL, 
    type_compte ENUM('Courant','Epargne') NOT NULL,
    solde DECIMAL NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id)
);

--Création de la table contrat 
CREATE TABLE contrat(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_client INT NOT NULL,
    type_contrat ENUM('Assurance vie','Assurance Habitation','Credit Immobilier','Credit a la consommation','Compte epargne logement') NOT NULL,
    montant DECIMAL NOT NULL,
    duree VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_client) REFERENCES client(id)
);

-- Insértion de données dans la table administrateur
INSERT INTO administrateur (user, mdp) VALUES
('Zahra', 'admin123');

-- Insértion de données dans la table client
INSERT INTO client (nom, prenom, email, telephone, adresse) VALUES
('Dupont', 'Alice', 'alice.lemoine@example.com', '0612345678', '10 rue de Paris, 75001 Paris'),
('Bernard', 'Luc', 'luc.bernard@example.com', '0622334455', '15 avenue des Champs, 75008 Paris'),
('Morel', 'Emma', 'emma.morel@example.com', '0633445566', '25 boulevard Haussmann, 75009 Paris'),
('Durant', 'Lucia', 'lucia.durant@example.com', '0633445568', '25 boulevard Haussmann, 75009 Paris');

-- Insértion de données dans la table compte
INSERT INTO compte (id_client, rib, type_compte, solde) VALUES
(1, 'FR7612345678901234567890123', 'Courant', 1500.50),
(1, 'FR7698765432109876543210987', 'Epargne', 5000.75),
(2, 'FR7611122233344455566677788', 'Courant', 250.00),
(3, 'FR7622233344455566677788999', 'Epargne', 10000.25);

-- Insértion de données dans la table contrat
INSERT INTO contrat (id_client, type_contrat, montant, duree) VALUES
(1, 'Assurance vie', 50000, '120'),
(1, 'Credit Immobilier', 150000, '240'),
(2, 'Assurance Habitation', 200, '12'),
(3, 'Credit a la consommation', 5000, '36'),
(3, 'Compte epargne logement', 10000, '60');

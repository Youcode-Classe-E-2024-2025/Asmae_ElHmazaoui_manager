

CREATE DATABASE location_voiture;

USE  location_voiture;

CREATE TABLE utilisateur(
  id_user INT PRIMARY KEY AUTO_INCREMENT,
  nom_user VARCHAR(255) NOT NULL,
  prenom_user VARCHAR(255) NOT NULL,
  email_user VARCHAR(255) NOT NULL,
  tel_user  VARCHAR(15) NOT NULL,
  role_user ENUM('client','admin') NOT NULL
);

CREATE TABLE voiture(
  id_voiture INT PRIMARY KEY AUTO_INCREMENT,
  modele VARCHAR(50) NOT NULL,
  marque VARCHAR(50) NOT NULL,
  couleur VARCHAR(30) NOT NULL,
  prix_jour  DECIMAL(10,2) NOT NULL
);


CREATE TABLE reservation(
  id_reservation INT PRIMARY KEY AUTO_INCREMENT,
  id_client INT,
  id_voiture_res INT,
  date_debut DATE NOT NULL,
  date_fin DATE NOT NULL,
  FOREIGN KEY (id_client) REFERENCES utilisateur (id_user),
  FOREIGN KEY (id_voiture_res) REFERENCES voiture (id_voiture)
);


CREATE TABLE Contrat(
  id_contrat INT PRIMARY KEY AUTO_INCREMENT,
  id_contrat_res INT,
  date_signature DATE NOT NULL,
  FOREIGN KEY (id_contrat_res) REFERENCES reservation (id_reservation)
);
 
--les traces d'une table paiment

-- Supprimer la contrainte de clé étrangère dans la table `paiment`
ALTER TABLE paiment DROP FOREIGN KEY paiment_ibfk_1;

-- Supprimer la table `paiment`
DROP TABLE paiment;

--test si la table `paiment` est bien supprimé
SELECT * FROM paiment;

CREATE TABLE paiment(
  id_paiment INT PRIMARY KEY AUTO_INCREMENT,
  id_paiment_res INT,
  outil_paiment   ENUM('paypal','CH','AttijariwafaBank') NOT NULL,
  numero_identite VARCHAR(55) NOT NULL,
  FOREIGN KEY (id_paiment_res) REFERENCES reservation (id_reservation)
);

ALTER TABLE voiture 
ADD COLUMN nom_voiture VARCHAR(255) NOT NULL,
ADD COLUMN photo_voiture VARCHAR(255) NOT NULL;


ALTER TABLE utilisateur
ADD COLUMN password_user VARCHAR(255) NOT NULL
AFTER email_user;

UPDATE utilisateur
SET role_user = 'admin'
WHERE id_user = 7;
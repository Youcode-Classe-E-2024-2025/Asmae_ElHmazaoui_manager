

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


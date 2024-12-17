

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



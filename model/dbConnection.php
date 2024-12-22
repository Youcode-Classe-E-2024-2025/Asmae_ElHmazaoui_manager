<?php

// définir arguments de consrtucteur de la classe mysqli
$servername="localhost";
$username="root";
$password="";
$dbname="location_voiture";

// création de l'objet $conn à partir de la class mysqli

$conn= new mysqli($servername,$username,$password,$dbname);

// check de la connexion;

if($conn->connect_error){
    die("connexion impossible" .$conn->connect_error);
}
?>
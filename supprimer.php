<?php
include 'dbConnection.php';

$id_USER=$_GET['id'] ?? '';

// suppression pour les utilisateurs
if($id_USER){
    // Supprimer les paiements associés à la réservation de l'utilisateur
    $del_paiments = $conn->prepare("DELETE p FROM paiment p JOIN reservation r ON p.id_paiment_res = r.id_reservation WHERE r.id_client = ?");
    $del_paiments->bind_param("i", $id_USER);
    $del_paiments->execute();
    $del_paiments->close();

     // Supprimer les contrats associés à la réservation de l'utilisateur
     $del_contrats = $conn->prepare("DELETE c FROM contrat c JOIN reservation r ON c.id_contrat_res = r.id_reservation WHERE r.id_client = ?");
     $del_contrats->bind_param("i", $id_USER);
     $del_contrats->execute();
     $del_contrats->close();
     
    // Suppression des réservations associées à l'utilisateur
    $del_reservations = $conn->prepare("DELETE FROM reservation WHERE id_client = ?");
    $del_reservations->bind_param("i", $id_USER);
    $del_reservations->execute();
    $del_reservations->close();


    // Suppression de l'utilisateur
    $del_user=$conn->prepare("DELETE FROM utilisateur WHERE id_user = ?");
    $del_user->bind_param("i",$id_USER);
    $del_user->execute();
    $del_user->close();
}


 header('Location: dashboard.php');
?>
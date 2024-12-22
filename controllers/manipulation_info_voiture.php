<?php

include '../model/dbConnection.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    // validation pour le nom du voiture
    $nom_voiture  = htmlspecialchars($_POST['nom_voiture']);
    // validation pour le modèle du voiture
    $modele_voiture  = htmlspecialchars($_POST['modele']);
     // validation pour la marque  du voiture
     $marque_voiture  = htmlspecialchars($_POST['marque']);
      // validation du couleur de la voiture
      $couleur_voiture  = htmlspecialchars($_POST['couleur']);
       // validation du prix de la voiture
       $prix_jour_voiture  = htmlspecialchars($_POST['prix_jour']);
       // validation de la photo de la voiture
       $photo_voiture = htmlspecialchars($_POST['photo_voiture']);

       // insertions dans la base de données après la validation 
       $sql=$conn->prepare("INSERT INTO voiture (modele,marque,couleur,prix_jour,nom_voiture,photo_voiture) VALUES (?,?,?,?,?,?)");
       $sql->bind_param("ssssss",$modele_voiture,$marque_voiture,$couleur_voiture,$prix_jour_voiture,$nom_voiture,$photo_voiture);
       
       if($sql->execute()){
       header('Location: ../view/dashboard.php');
       }else{
        echo "Erreur".$sql->error;
       }

    $sql->close();
    $conn->close();

}

?>
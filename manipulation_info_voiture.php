<?php
include 'dbConnection.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    // validation pour le nom du voiture
    $nom_voiture  = htmlspecialchars($_POST['nom_voiture']);
         if(!preg_match("/^[a-zA-Z' ]+$/",$nom_voiture)){
           $nomVoiture_ERR = "le nom doit contenir seulement les lettres";
         }

    // validation pour le modèle du voiture
    $modele_voiture  = htmlspecialchars($_POST['modele']);
    if(!preg_match("/^[A-Za-z0-9\- ]+$ /",$modele_voiture)){
      $modeleVoiture_ERR = "le nom doit contenir seulement les lettres";
    }

     // validation pour la marque  du voiture
     $marque_voiture  = htmlspecialchars($_POST['marque']);
     if(!preg_match("/^[A-Za-z\-]+$/",$marque_voiture)){
       $marqueVoiture_ERR = "le nom doit contenir seulement les lettres";
     }

      // validation du couleur de la voiture
      $couleur_voiture  = htmlspecialchars($_POST['couleur']);
      if(!preg_match("/^[a-zA-Z' ]+$/",$couleur_voiture)){
        $couleurVoiture_ERR = "le nom doit contenir seulement les lettres";
      }

       // validation du prix de la voiture
       $prix_jour_voiture  = htmlspecialchars($_POST['prix_jour']);
       if(!filter_var($prix_jour_voiture, FILTER_VALIDATE_FLOAT) && $prix_jour_voiture > 0){
         $prix_jourVoiture_ERR = "le nom doit contenir seulement les lettres";
       }

       // validation de la photo de la voiture
       $photo_voiture = htmlspecialchars($_POST['photo_voiture']);
       if(filter_var($photo_voiture, FILTER_VALIDATE_URL)){
         $photo_voiture_ERR = "le nom doit contenir seulement les lettres";
       }

       // insertions dans la base de données après la validation 
       
       $sql=$conn->prepare("INSERT INTO voiture (modele,marque,couleur,prix_jour,nom_voiture,photo_voiture) VALUES (?,?,?,?,?,?)");
       $sql->bind_param("ssssss",$modele_voiture,$marque_voiture,$couleur_voiture,$prix_jour_voiture,$nom_voiture,$photo_voiture);
       
       if($sql->execute()){
        echo "insertion réussie";
       }else{
        echo "Erreur".$sql->error;
       }
       
    $sql->close();
    $conn->close();

}

?>
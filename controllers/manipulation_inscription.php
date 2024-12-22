<?php

// Connexion à la base de données
include '../model/dbConnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // validation pour le nom
    $nom_user  = htmlspecialchars($_POST['nom_user']);
       

    // validation pour le prenom
    $prenom_user  = htmlspecialchars($_POST['prenom_user']);
         

    // validation pour le mot de passe 
    $password_user  = htmlspecialchars($_POST['password_user']);
    $hashedPW=password_hash($password_user,PASSWORD_DEFAULT);
       
 
    // validation de confirmation pour le mot de passe 
    $confirmation_password_user  = htmlspecialchars($_POST['confirmation_password_user']);

    // validation pour l'email 
    $email_user = htmlspecialchars($_POST['email_user']);
       

    // validation pour le  téléphone
    $tel_user = $_POST['tel_user'];
         
    

    // insertions dans la base de données si les mots de passe sont identiques 


      $sql=$conn->prepare("INSERT INTO utilisateur (nom_user, prenom_user,email_user,password_user,tel_user, role_user) VALUES (?,?,?,?,?,'client')");
      $sql->bind_param("sssss",$nom_user,$prenom_user,$email_user,$hashedPW,$tel_user);
      
      if($sql->execute()){
        header('Location: ../view/locationV.php');
      }else{
        echo "Erreur".$sql->error;
      }
    
    $sql->close();
    $conn->close();
}

?>



<!-- 
// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = mysqli_real_escape_string($conn, $_POST['nom_user']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom_user']);
    $email = mysqli_real_escape_string($conn, $_POST['email_user']);
    $message = mysqli_real_escape_string($conn, $_POST['message_user']); // Si tu as un champ message

    // Insertion des données dans la base de données
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, message) 
            VALUES ('$nom', '$prenom', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès !";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close(); --> 

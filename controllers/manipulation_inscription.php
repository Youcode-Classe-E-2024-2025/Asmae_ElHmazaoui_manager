<?php
session_start();
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

      // Vérification si les mots de passe correspondent
       if ($password_user !== $confirmation_password_user) {
         echo "Les mots de passe ne correspondent pas.";
         exit;
     }

        
    // validation pour l'email 
    $email_user = htmlspecialchars($_POST['email_user']);
       

    // validation pour le  téléphone
    $tel_user = $_POST['tel_user'];

    // authentification avant l'insertion dans la base de données 
    $sqlCheck=$conn->prepare("SELECT email_user,tel_user FROM utilisateur WHERE role_user = 'client' AND (email_user = ? OR tel_user = ?)");
   // lecture des paramètres
    $sqlCheck->bind_param("ss",$email_user,$tel_user);
   
    // exécution de la raquete;
    $sqlCheck->execute();
    $resultCheck = $sqlCheck->get_result();

    // Si l'email ou le téléphone existe déjà
    if($resultCheck->num_rows >0){
      echo"l'email ou mot de pass existe déjà ";
      exit;
    }

    // insertions dans la base de données si les informations sont valides
      $sql=$conn->prepare("INSERT INTO utilisateur (nom_user, prenom_user,email_user,password_user,tel_user, role_user) VALUES (?,?,?,?,?,'client')");
  
      // lecture des paramètres pour l'insertion
      $sql->bind_param("sssss",$nom_user,$prenom_user,$email_user,$hashedPW,$tel_user);
      
      // execution de la requete sql
      if($sql->execute()){
        $_SESSION['id_user'] = $id_user;
        header('Location: ../view/locationV.php');
      }else{
        echo "Erreur".$sql->error;
      }
   
    $sql->close();
    $conn->close();
}

?>




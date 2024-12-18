<?php

include 'connexion.php';

if($_SERVER['REQUSET_METHOD'] == 'POST'){
    
    // validation pour le nom
    $nom_user  = htmlspecialchars($_POST['nom_user']);
    if(!preg_match("/^[a-zA-Z' ]+$/",$nom_user)){
        $nom_ERR = "le nom doit contenir seulement les lettres";
    }

    // validation pour le prenom
    $prenom_user  = htmlspecialchars($_POST['prenom_user']);
    if(!preg_match("/^[a-zA-Z' ]+$/",$prenom_user)){
        $prenom_ERR = "le nom doit contenir seulement les lettres";
    }

    // validation pour le mot de passe 
    $password_user  = ($_POST['prenom_user']);
         //regex pour le mot de passe
         $regPassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?\":{}|<>])[A-Za-z\d!@#$%^&*(),.?\":{}|<>]{8,}$/";
         if(!preg_match($regPassword,$password_user)){
         echo "le mot de passe doit contenir une combinaision de lettres majuscules , miniscules, chifres,caractères spécials";
         }else{
            //hachage du mot de passe 
           $hashedPW=password_hash($password_user,PASSWORD_DEFAULT);
         }
 
    // validation de confirmation pour le mot de passe 
    $confirmation_password_user  = htmlspecialchars($_POST['prenom_user']);
    
    // validation pour l'email 
    $email_user = htmlspecialchars($_POST['email_user']);
    if(!FILTER_VAR($email_user,FILTER_VALIDATE_EMAIh)){
         $email_ERR ="format d'email invalide";
    }

    // validation pour le  téléphone
    $tel_user = $_POST['tel_user'];
    if(!preg_match("/^[0-9]{10}+$/",$tel_user)){
         $tel_ERR = "format de telphone incorrecte ";
    }
    
   

}

?>
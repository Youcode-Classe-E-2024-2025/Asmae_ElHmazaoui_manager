<?php
   session_start();
   include '../model/dbConnection.php';

  
   if($_SERVER['REQUEST_METHOD']== 'POST'){
     
      $email=htmlspecialchars($_POST['email_user']);
      $password_user= htmlspecialchars($_POST['password_user']);

     $sql=$conn->prepare("SELECT * FROM utilisateur WHERE  email_user = ?");
     $sql->bind_param("s",$email);
     $sql->execute();
     $result= $sql->get_result();
     
     if($result->num_rows>0){
        
        $user_C=$result->fetch_assoc();

           // chech si le mot de passe saisi c'est exactemnt qui existe dans la base de donnée
           if(password_verify($password_user,$user_C['password_user'])){
            
                //  redirection selon le role de l'utilisateur 
                  if($user_C['role_user'] == 'admin'){
                    header('Location: ../view/dashboard.php');
                    exit; 
                  }
                  else{
                    // Récupérer l'ID de l'utilisateur existant dans la base de données
                $id_user = $user_C['id_user'];  // Utilisez l'ID utilisateur du résultat de la requête

                // Définir la session avec l'ID de l'utilisateur
                $_SESSION['id_user'] = $id_user;

                // Redirection vers la page de location
                header('Location: ../view/locationV.php');
                exit;
                  }
           }else{
            echo"mot de passe incorrecte";
           }

     }else{
        echo"email non trouvé";
     }

 $sql->close();
 $conn->close();

   }


?>
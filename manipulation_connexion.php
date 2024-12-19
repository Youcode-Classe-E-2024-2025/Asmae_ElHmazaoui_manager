<?php
   include 'dbConnection.php';

  
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
                    header('Location: tok.php');
                    exit; 
                  }
                  else{
                    header('Location: tok3.php'); 
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
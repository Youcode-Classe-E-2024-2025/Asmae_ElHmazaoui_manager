
<?php
// Connexion à la base de données
include '../model/dbConnection.php';
$sql = "SELECT id_voiture, nom_voiture, photo_voiture FROM voiture";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:black;
            padding: 0;
            margin: 0;
        }
        h3{
            color:white;
        }
        .car-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Crée 4 colonnes égales */
            gap: 20px; /* Espace entre les éléments */
            padding: 20px;
        }
        .car-item {
            margin-top:70px;
            text-align: center;
            border: 1px solid #ddd;
            height: 400px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(117, 124, 189, 0.98);
        }
        .car-item img {
            width: 100%;
            height: 300px;
            border-radius: 5px;
        }
        .car-item button {
            padding: 10px;
            background-color:rgb(23, 37, 82);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 80px;
        }
        .car-item button:hover {
            background-color:rgb(29, 79, 110);
        }
        @media (max-width: 1200px) {
            .car-container {
                grid-template-columns: repeat(3, 1fr); /* 3 colonnes pour les écrans plus petits */
            }
        }
        @media (max-width: 900px) {
            .car-container {
                grid-template-columns: repeat(2, 1fr); /* 2 colonnes pour les écrans encore plus petits */
            }
        }
        @media (max-width: 600px) {
            .car-container {
                grid-template-columns: 1fr; /* 1 colonne pour les petits écrans (smartphones) */
            }
        }
        header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: rgba(49, 49, 49, 0.68);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 100;
        }
        
        .logo img {
        height:30px;
        width: 50px;
        }
        
        .nav-links {
        display: flex;
        gap: 20px;
        }
        
        .nav-links a {
        color: white;
        text-decoration: none;
        font-size: 1.2em;
        }
        
        .nav-links a:hover {
        text-decoration:none;
        }
        .auth-icons {
        margin-right:50px;
        }
        
        .auth-icons a {
        margin-left: 15px;
        text-decoration: none;
        color:white;
        }
        
        .auth-icons img {
        width: 30px;
        height: 30px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="../asset/vidéo/logo.png" alt="Logo">
    </div>
    <div class="nav-links">
        <a href="#about-us">Voitures</a>
        <a href="#services">Location</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="auth-icons">
        <a href="#" id="logoutBtn"><i class="fas fa-sign-in-alt"></i></a>
    </div>
</header>
<div class="car-container">
    
   <?php 
   session_start(); // Démarrer la session
   if($result->num_rows >0){
       while($dataV=$result->fetch_assoc()){
         
        echo " <div class='car-item'>
          <img src='" . $dataV['photo_voiture'] . "' alt= '" . $dataV['nom_voiture'] . " '>
          <h3>". $dataV['nom_voiture'] ."</h3>
          <form action='process_reservation.php' method='POST'>
              <input type='hidden' name='id_voituretest' value=' " . $dataV['id_voiture'] ."'>
              <button type='submit'>Louer </button>
          </form>
          </div>
        ";

       }
          
   }else{
    echo "Aucune voiture disponible.";
   }
   $conn->close();
   
    ?>
</div>
<script>
    // Déconnexion
    logoutBtn.addEventListener('click', function() {
        alert('Vous êtes déconnecté!');
        window.location.href = 'deconnexion.php'; // Remplacer par l'URL appropriée
    });
</script>
</body>
</html>

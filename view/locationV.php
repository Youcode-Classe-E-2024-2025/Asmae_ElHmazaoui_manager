
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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .car-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Crée 4 colonnes égales */
            gap: 20px; /* Espace entre les éléments */
            padding: 20px;
        }
        .car-item {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .car-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .car-item button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .car-item button:hover {
            background-color: #218838;
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
    </style>
</head>
<body>

<h1>Toutes les Voitures Disponibles</h1>
<div class="car-container">
    
   <?php 
   if($result->num_rows >0){
       while($dataV=$result->fetch_assoc()){
         
        echo " <div class='car-item'>
          <img src='" . $dataV['photo_voiture'] . "' alt= '" . $dataV['nom_voiture'] . " '>
          <h3>". $dataV['nom_voiture'] ."</h3>
          <form action='../controllers/manipulation_process_reservation.php' method='POST'>
              <input type='hidden' name='id_voiture' value=' " . $dataV['id_voiture'] ."'>
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

</body>
</html>

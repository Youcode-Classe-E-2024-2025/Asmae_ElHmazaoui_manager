<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="../asset/infoVoiture.css">
</head>
<body>

    <div class="form-container">
        <h2>Ajouter une voiture</h2>

        <form action="manipulation_info_voiture.php" method="POST" >
            <!-- Nom de la voiture -->
            <label >Nom de la voiture :</label>
            <input type="text" name="nom_voiture" required maxlength="255">

            <!-- Modèle de la voiture -->
            <label>Modèle :</label>
            <input type="text" name="modele" required maxlength="50">

            <!-- Marque de la voiture -->
            <label>Marque :</label>
            <input type="text" name="marque" required maxlength="50">

            <!-- Couleur de la voiture -->
            <label>Couleur :</label>
            <input type="text" name="couleur" required maxlength="30">

            <!-- Prix par jour -->
            <label>Prix par jour :</label>
            <input type="number" name="prix_jour" required step="0.01" min="0">

            <!-- Photo de la voiture (URL ou chemin) -->
            <label >Photo de la voiture (URL) :</label>
            <input type="text" name="photo_voiture" required maxlength="255">

            <!-- Bouton de soumission -->
            <button type="submit">Ajouter la voiture</button>
        </form>
    </div>

</body>
</html>

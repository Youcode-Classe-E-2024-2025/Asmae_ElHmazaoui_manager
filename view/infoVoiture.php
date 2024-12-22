<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une voiture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../asset/infoVoiture.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../asset/vidéo/logo.png" alt="Logo">
    </div>
    <div class="auth-icons">
        <a href="#"><i class="fas fa-user-plus"></i></a>
        <a href="#"><i class="fas fa-sign-in-alt"></i></a>
    </div>
</header>
    <div class="form-container">
        <h2>Ajouter une voiture</h2>

        <form action="../controllers/manipulation_info_voiture.php" method="POST" >
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

    <!-- script pour les validations des inputs du voiture -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer le formulaire
        const form = document.querySelector("form");

        form.addEventListener("submit", function(event) {
            // Empêcher l'envoi du formulaire si une validation échoue
            event.preventDefault();

            // Récupérer les éléments du formulaire
            const nomVoiture = document.querySelector("input[name='nom_voiture']");
            const modele = document.querySelector("input[name='modele']");
            const marque = document.querySelector("input[name='marque']");
            const couleur = document.querySelector("input[name='couleur']");
            const prixJour = document.querySelector("input[name='prix_jour']");
            const photoVoiture = document.querySelector("input[name='photo_voiture']");

            let isValid = true;

            // Expression régulière pour autoriser uniquement des lettres (espaces et tirets autorisés)
            const lettersRegex = /^[a-zA-Z\s\-]+$/;

            // Valider le nom de la voiture (lettres, espaces et tirets uniquement, max 255 caractères)
            if (nomVoiture.value.trim() === "" || nomVoiture.value.length > 30 || !lettersRegex.test(nomVoiture.value)) {
                alert("Le nom de la voiture doit contenir uniquement des lettres, des espaces ou des tirets, et ne doit pas dépasser 30 caractères.");
                isValid = false;
            }

            // Valider le modèle (lettres, espaces et tirets uniquement, max 50 caractères)
            if (modele.value.trim() === "" || modele.value.length > 30 || !lettersRegex.test(modele.value)) {
                alert("Le modèle doit contenir uniquement des lettres, des espaces ou des tirets, et ne doit pas dépasser 30 caractères.");
                isValid = false;
            }

            // Valider la marque (lettres, espaces et tirets uniquement, max 50 caractères)
            if (marque.value.trim() === "" || marque.value.length > 30 || !lettersRegex.test(marque.value)) {
                alert("La marque doit contenir uniquement des lettres, des espaces ou des tirets, et ne doit pas dépasser 30 caractères.");
                isValid = false;
            }

            // Valider la couleur (lettres, espaces et tirets uniquement, max 30 caractères)
            if (couleur.value.trim() === "" || couleur.value.length > 30 || !lettersRegex.test(couleur.value)) {
                alert("La couleur doit contenir uniquement des lettres, des espaces ou des tirets, et ne doit pas dépasser 30 caractères.");
                isValid = false;
            }

            // Valider le prix par jour (doit être un nombre positif)
            if (isNaN(prixJour.value) || prixJour.value <= 0) {
                alert("Le prix par jour doit être un nombre positif.");
                isValid = false;
            }

            // Valider la photo de la voiture (URL ou chemin valide)
            const photoRegex = /^(https?:\/\/)?([\w-]+(\.[\w-]+)+)(\/[\w-._~:?#\[\]@!$&'()*+,;=]*)*(\.[a-z]{2,})?$/i;
            if (!photoVoiture.value.trim() || !photoRegex.test(photoVoiture.value)) {
                alert("L'URL de la photo de la voiture est invalide.");
                isValid = false;
            }

            // Si tout est valide, envoyer le formulaire
            if (isValid) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>

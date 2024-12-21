<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../asset/inscription.css">
</head>
<body>

    <div class="form-container">
        <h2>Inscription</h2>
        <form action="../controllers/manipulation_inscription.php" method="POST">
            <div>
                <label >Nom :</label>
                <input type="text"  name="nom_user" required>
            </div>
            <div>
                <label>Prénom :</label>
                <input type="text"name="prenom_user" required>
            </div>
            <div>
                <label>Email :</label>
                <input type="email"name="email_user" required>
            </div>
            <div class="input-container">
                <label>Mot de passe :</label>
                <input type="password" name="password_user" required>
            </div>
            <div class="input-container">
                <label>confirmation de mot de passe :</label>
                <input type="password" name="confirmation_password_user" required>
            </div>
            <div>
                <label>Numéro de téléphone :</label>
                <input type="tel" name="tel_user" pattern="[0-9]{10}" required>
            </div>
            <button type="submit">Envoyer</button>
        </form>

        <!-- Liens pour la connexion -->
        <div class="link-container">
            <p>Vous avez déjà un compte ? <a href="../view/connexion.php">Connexion</a></p>
        </div>
    </div>

</body>
</html>

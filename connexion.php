
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="asset/connexion.css">
</head>
<body>
    <div class="form-container">
        <h2>Connexion</h2>
        <form action="manipulation_connexion.php" method="POST">
            <div>
                <label for="email_user">Email :</label>
                <input type="email" id="email_user" name="email_user" required>
            </div>
            <div>
                <label for="password_user">Mot de passe :</label>
                <input type="password" id="password_user" name="password_user" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <!-- Liens pour l'inscription -->
        <div class="link-container">
            <p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
        </div>
    </div>
</body>
</html>












































































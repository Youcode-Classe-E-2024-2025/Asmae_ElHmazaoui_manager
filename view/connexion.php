
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../asset/connexion.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../asset/vidéo/logo.png" alt="Logo">
    </div>
    <div class="nav-links">
        <a href="#about-us">À propos</a>
        <a href="#services">Nos Services</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="auth-icons">
        <a href="#"><i class="fas fa-user-plus"></i></a>
        <a href="#"><i class="fas fa-sign-in-alt"></i></a>
    </div>
</header>
<!-- Image à droite -->
  <div class="car">
            <img src="../asset/vidéo/voitureC.png" alt="Image d'illustration">
        </div> 
    <div class="form-container">
        <h2>Connexion</h2>
        <form action="../controllers/manipulation_connexion.php" method="POST">
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
            <p>Pas encore de compte ? <a href="../view/inscription.php">S'inscrire</a></p>
        </div>
    </div>
</body>
</html>












































































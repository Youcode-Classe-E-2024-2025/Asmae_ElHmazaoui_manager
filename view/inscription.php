<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../asset/inscription.css">
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

    <div class="form-container">
        
        <form action="../controllers/manipulation_inscription.php" method="POST">
        <h2>Inscription</h2>
           <div class="name-container">
              <div>
                  <label>Nom :</label>
                  <input type="text" name="nom_user" required>
              </div>
              <div>
                  <label>Prénom :</label>
                  <input type="text" name="prenom_user" required>
              </div>
           </div>
            <div>
                <label>Numéro de téléphone :</label>
                <input type="tel" name="tel_user" pattern="[0-9]{10}" required>
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
            
            <button type="submit">Envoyer</button>

            <div class="link-container">
            <p>Vous avez déjà un compte ? <a href="../view/connexion.php">Connexion</a></p>
            </div>
        </form>

      
              
    </div>
<!-- Image à droite -->
       <div class="car">
            <img src="../asset/vidéo/voitureI.png" alt="Image d'illustration">
        </div> 

     
</body>
</html>

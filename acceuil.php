<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
        /* Style général */
    body, html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100%;
        color: white;
        background-color: #111;
    }
    
    /* Header */
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
    
    /* Vidéo centrée */
    .video-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow: hidden;
    }
    
    .video-container video {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    
    /* Footer */
    footer {
        text-align: center;
        padding: 20px;
        background-color: #111;
        color: white;
        position: relative;
        bottom: 0;
        width: 100%;
    }
 
.video-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}




</style>

</head>
<body>
    <!-- Header avec logo et liens cliquables -->
    <header>
    <div class="logo">
        <img src="asset/vidéo/logo.png" alt="Logo">
    </div>
    <div class="nav-links">
        <a href="#about-us">À propos</a>
        <a href="#services">Nos Services</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="auth-icons">
        <a href="view/inscription.php"><i class="fas fa-user-plus"></i></a>
        <a href="view/connexion.php"><i class="fas fa-sign-in-alt"></i></a>
    </div>
</header>

<div class="video-container">
<video autoplay loop muted>
        <source src="asset/vidéo/introVoiture.mp4" type="video/mp4">
       
    </video>
</div>






    

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Votre Entreprise. Tous droits réservés.</p>
    </footer>

</body>
</html>

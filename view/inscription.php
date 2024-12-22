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
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            let valid = true;

            // Récupération des champs du formulaire
            const nom = document.querySelector('input[name="nom_user"]');
            const prenom = document.querySelector('input[name="prenom_user"]');
            const tel = document.querySelector('input[name="tel_user"]');
            const email = document.querySelector('input[name="email_user"]');
            const password = document.querySelector('input[name="password_user"]');
            const confirmPassword = document.querySelector('input[name="confirmation_password_user"]');
            
            // Validation du nom (lettres et espace seulement, max 30 caractères)
            const nomPattern = /^[A-Za-zàâäéèêëîïôöùûüç\s]+$/;
            if (nom.value.trim() === "") {
                alert("Le champ 'Nom' est obligatoire.");
                valid = false;
            } else if (!nomPattern.test(nom.value) || nom.value.length > 30) {
                alert("Le 'Nom' doit contenir uniquement des lettres et ne pas dépasser 30 caractères.");
                valid = false;
            }

            // Validation du prénom (lettres et espace seulement, max 30 caractères)
            const prenomPattern = /^[A-Za-zàâäéèêëîïôöùûüç\s]+$/;
            if (prenom.value.trim() === "") {
                alert("Le champ 'Prénom' est obligatoire.");
                valid = false;
            } else if (!prenomPattern.test(prenom.value) || prenom.value.length > 30) {
                alert("Le 'Prénom' doit contenir uniquement des lettres et ne pas dépasser 30 caractères.");
                valid = false;
            }

            // Validation du numéro de téléphone
            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(tel.value)) {
                alert("Veuillez entrer un numéro de téléphone valide (10 chiffres).");
                valid = false;
            }

            // Validation de l'email
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email.value)) {
                alert("Veuillez entrer un email valide.");
                valid = false;
            }

            // Validation du mot de passe : au moins 8 caractères, incluant lettres, chiffres et caractères spéciaux
            const passwordPattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
            if (!passwordPattern.test(password.value)) {
                alert("Le mot de passe doit contenir au moins 8 caractères, dont des lettres, des chiffres et des caractères spéciaux.");
                valid = false;
            }

            // Validation de la confirmation du mot de passe
            if (confirmPassword.value !== password.value) {
                alert("Les mots de passe ne correspondent pas.");
                valid = false;
            }

            // Si une des validations échoue, on empêche l'envoi du formulaire
            if (!valid) {
                event.preventDefault();
            }
        });
    });
</script>


</body>
</html>

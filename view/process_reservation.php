<?php
session_start(); // Démarrer la session
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="../asset/process_reservation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <a href="#"><i class="fas fa-user-plus"></i></a>
        <a href="#"><i class="fas fa-sign-in-alt"></i></a>
    </div>
</header>
    <div class="form-container">
        <h2>Location</h2>
        <form action="../controllers/manipulation_process_reservation.php" method="POST">
            <h3>Réservation</h3>
            <label >Date de Début :</label>
            <input type="date" name="date_debut" required><br><br>

            <label>Date de Fin :</label>
            <input type="date" name="date_fin" required><br><br>

            <h3>Contrat</h3>
            <label>Date de Signature :</label>
            <input type="date" name="date_signature" required><br><br>

            <h3>Paiement</h3>
            <div class="payment-methods">
                <div class="payment-method">
                    <img src="../asset/vidéo/paypal.png" alt="Visa">
                    <input type="radio" name="payment_method" value="paypal" required>
                    <label>PayPal</label>
                </div>
                <div class="payment-method">
                    <img src="../asset/vidéo/mastercard.png" alt="MasterCard">
                    <input type="radio" name="payment_method" value="mastercard" required>
                    <label>MASTER CARD</label>
                </div>
                <div class="payment-method">
                    <img src="../asset/vidéo/visa.png" alt="PayPal">
                    <input type="radio" name="payment_method" value="visa" required>
                    <label>VISA</label>
                </div>
            </div><br><br>

            <label>Numero_identite :</label>
            <input type="text" step="0.01" name="montant" required><br><br>
            <?php 
            
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $_SESSION['id_voiture'] = $_POST['id_voituretest'];

            }?>
            <input type="hidden" name="id_voiture" value="<?php echo $_SESSION['id_voiture']; ?>">
            <button type="submit">Réserver</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="asset/process_reservation.css">
</head>
<body>
    <div class="form-container">
        <h2>Réservation</h2>
        <form action="process_reservation.php" method="POST">
            <label for="date_debut">Date de Début :</label>
            <input type="date" name="date_debut" required><br><br>

            <label for="date_fin">Date de Fin :</label>
            <input type="date" name="date_fin" required><br><br>

            <h3>Contrat</h3>
            <label for="date_signature">Date de Signature :</label>
            <input type="date" name="date_signature" required><br><br>

            <h3>Paiement</h3>
            <div class="payment-methods">
                <div class="payment-method">
                    <img src="" alt="Visa">
                    <input type="radio" name="payment_method" value="visa" required>
                    <label>PayPal</label>
                </div>
                <div class="payment-method">
                    <img src="" alt="MasterCard">
                    <input type="radio" name="payment_method" value="mastercard" required>
                    <label>CH</label>
                </div>
                <div class="payment-method">
                    <img src="" alt="PayPal">
                    <input type="radio" name="payment_method" value="paypal" required>
                    <label>Attijari</label>
                </div>
            </div><br><br>

            <label for="montant">Numero_identite :</label>
            <input type="number" step="0.01" name="montant" required><br><br>

            <button type="submit">Réserver</button>
        </form>
    </div>
</body>
</html>

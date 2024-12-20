<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Changez en fonction de votre configuration
$password = ""; // Changez en fonction de votre configuration
$dbname = "location_voiture";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fonction de validation des données
function validate_date($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function validate_payment_method($payment_method) {
    $valid_methods = ['paypal', 'CH', 'AttijariwafaBank'];
    return in_array($payment_method, $valid_methods);
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $date_signature = $_POST['date_signature'];
    $payment_method = $_POST['payment_method'];
    $numero_identite = $_POST['montant']; // Le champ montant contient ici le numéro d'identité

    // Valider les dates
    if (!validate_date($date_debut)) {
        echo "Date de début invalide. Veuillez entrer une date au format YYYY-MM-DD.";
        exit;
    }

    if (!validate_date($date_fin)) {
        echo "Date de fin invalide. Veuillez entrer une date au format YYYY-MM-DD.";
        exit;
    }

    if (!validate_date($date_signature)) {
        echo "Date de signature invalide. Veuillez entrer une date au format YYYY-MM-DD.";
        exit;
    }

    // Valider la méthode de paiement
    if (!validate_payment_method($payment_method)) {
        echo "Méthode de paiement invalide.";
        exit;
    }

    // Valider le numéro d'identité
    if (empty($numero_identite) || !preg_match("/^[a-zA-Z0-9]+$/", $numero_identite)) {
        echo "Numéro d'identité invalide. Il ne doit contenir que des caractères alphanumériques.";
        exit;
    }

    // Assurez-vous d'avoir l'id du client et du véhicule (ces valeurs doivent être récupérées dynamiquement)
    $id_client = 1;  // Remplacer par l'ID de l'utilisateur connecté
    $id_voiture_res = 1;  // Remplacer par l'ID de la voiture choisie

    // Début de la transaction
    $conn->begin_transaction();

    try {
        // Insérer la réservation
        $sql_reservation = "INSERT INTO reservation (id_client, id_voiture_res, date_debut, date_fin) 
                            VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_reservation);
        $stmt->bind_param("iiss", $id_client, $id_voiture_res, $date_debut, $date_fin);
        $stmt->execute();

        // Récupérer l'ID de la réservation insérée
        $id_reservation = $conn->insert_id;

        // Insérer le contrat
        $sql_contrat = "INSERT INTO Contrat (id_contrat_res, date_signature) VALUES (?, ?)";
        $stmt = $conn->prepare($sql_contrat);
        $stmt->bind_param("is", $id_reservation, $date_signature);
        $stmt->execute();

        // Insérer le paiement
        $sql_paiement = "INSERT INTO paiment (id_paiment_res, outil_paiment, numero_identite) 
                         VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql_paiement);
        $stmt->bind_param("iss", $id_reservation, $payment_method, $numero_identite);
        $stmt->execute();

        // Commit de la transaction
        $conn->commit();
        echo "Réservation effectuée avec succès !";
    } catch (Exception $e) {
        // En cas d'erreur, on annule la transaction
        $conn->rollback();
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion
    $stmt->close();
}

$conn->close();
?>
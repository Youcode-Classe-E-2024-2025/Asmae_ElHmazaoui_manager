<?php
// Démarrer la session
session_start();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers une page de déconnexion (par exemple, la page d'accueil ou la page de connexion)
header("Location: connexion.php");
exit; // S'assurer que le code après cette ligne ne s'exécute pas.
?>

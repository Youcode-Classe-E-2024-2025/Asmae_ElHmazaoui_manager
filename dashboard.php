<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="asset/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Dashboard</h2>
        </div>
        <ul>
            <li><a href="#voitures">Voitures</a></li>
            <li><a href="#utilisateurs">Utilisateurs</a></li>
            <li><a href="#reservations">Réservations</a></li>
            <li><a href="#logout" id="logoutBtn">Déconnexion</a></li>
        </ul>
    </div>

    <div class="content">
        <section id="voitures">
            <h3>Liste des Voitures</h3>
            <ul>
                <li>Voiture 1 - Marque 1</li>
                <li>Voiture 2 - Marque 2</li>
                <li>Voiture 3 - Marque 3</li>
            </ul>
        </section>

        <section id="utilisateurs">
            <h3>Liste des Utilisateurs</h3>
            <ul>
                <li>Utilisateur 1</li>
                <li>Utilisateur 2</li>
                <li>Utilisateur 3</li>
            </ul>
        </section>

        <section id="reservations">
            <h3>Liste des Réservations</h3>
            <ul>
                <li>Réservation 1 - Voiture 1</li>
                <li>Réservation 2 - Voiture 2</li>
                <li>Réservation 3 - Voiture 3</li>
            </ul>
        </section>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Références aux sections
    const voituresSection = document.getElementById('voitures');
    const utilisateursSection = document.getElementById('utilisateurs');
    const reservationsSection = document.getElementById('reservations');

    // Références aux liens du menu
    const voituresLink = document.getElementById('voituresLink');
    const utilisateursLink = document.getElementById('utilisateursLink');
    const reservationsLink = document.getElementById('reservationsLink');
    const logoutBtn = document.getElementById('logoutBtn');

    // Fonction pour afficher une section
    function showSection(sectionToShow) {
        // Cacher toutes les sections
        voituresSection.style.display = 'none';
        utilisateursSection.style.display = 'none';
        reservationsSection.style.display = 'none';
        
        // Afficher la section demandée
        sectionToShow.style.display = 'block';
    }

    // Événements pour chaque lien du menu
    voituresLink.addEventListener('click', function(e) {
        e.preventDefault();  // Empêche le comportement par défaut du lien
        showSection(voituresSection);
    });

    utilisateursLink.addEventListener('click', function(e) {
        e.preventDefault();
        showSection(utilisateursSection);
    });

    reservationsLink.addEventListener('click', function(e) {
        e.preventDefault();
        showSection(reservationsSection);
    });

    // Déconnexion
    logoutBtn.addEventListener('click', function() {
        alert('Vous êtes déconnecté!');
        window.location.href = 'login.html'; // Remplacer par l'URL appropriée
    });

    // Par défaut, afficher la section des voitures au démarrage
    showSection(voituresSection);
});

    </script>
</body>
</html>

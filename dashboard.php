
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="asset/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>  
    table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }</style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h2>Dashboard</h2>
        </div>
        <ul>
            <li><a href="#" id="voituresLink">Voitures</a></li>
            <li><a href="#" id="utilisateursLink">Utilisateurs</a></li>
            <li><a href="#" id="reservationsLink">Réservations</a></li>
            <li><a href="#" id="logoutBtn">Déconnexion</a></li>
        </ul>
    </div>

    <div class="content">
        <section id="voitures" class="dashboard-section">
            <h3>Liste des Voitures</h3>
            <table>
        <thead>
            <tr>
                <th>Nom voiture</th>
                <th>modèle</th>
                <th>marque</th>
                <th>couleur</th>
                <th>prix par jour</th>
                <th>photo </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Valeur 1</td>
                <td>Valeur 2</td>
                <td>Valeur 3</td>
                <td>Valeur 4</td>
                <td>Valeur 5</td>
                <td>Valeur 6</td>
                <td>
                <i class="fas fa-trash-alt"></i>
                <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr>
                <td>Valeur A</td>
                <td>Valeur B</td>
                <td>Valeur C</td>
                <td>Valeur D</td>
                <td>Valeur E</td>
                <td>Valeur F</td>
                <td>
                <i class="fas fa-trash-alt"></i>
                <i class="fas fa-edit"></i>
                </td>
            </tr>
        </tbody>
    </table>
        </section>

        <section id="utilisateurs" class="dashboard-section" style="display: none;">
            <h3>Liste des Utilisateurs</h3>
            <ul>
                <li>Utilisateur 1</li>
                <li>Utilisateur 2</li>
                <li>Utilisateur 3</li>
            </ul>
        </section>

        <section id="reservations" class="dashboard-section" style="display: none;">
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

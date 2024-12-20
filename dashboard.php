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

    <script src="script.js"></script>
</body>
</html>

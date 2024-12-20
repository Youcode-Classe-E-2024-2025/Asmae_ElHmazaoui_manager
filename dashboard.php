
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
               }
    </style>
</head>
<body>

<?php
        include 'dbConnection.php';
        
        //  selectioner tout les infos des utilisatuers
        $info_User=$conn->query("SELECT * FROM utilisateur ");
        
        //  selectioner tout les infos des voiture
        $info_Voiture=$conn->query("SELECT * FROM  voiture ");
        
        //  selectioner tout les infos du tableau reservation
        $info_Reser=$conn->query("SELECT * FROM reservation ");
        
        //  selectioner tout les infos du tableau contrat
        $info_Contrat=$conn->query("SELECT * FROM Contrat ");
        
        //  selectioner tout les infos du tableau paiment
        $info_Paiment=$conn->query("SELECT * FROM paiment ");
?>


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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php while($dataVoiture=$info_Voiture->fetch_assoc()):?> 
                        <td><?= $dataVoiture['nom_voiture'] ?></td>
                        <td><?= $dataVoiture['modele'] ?></td>
                        <td><?= $dataVoiture['marque'] ?></td>
                        <td><?= $dataVoiture['couleur'] ?></td>
                        <td><?= $dataVoiture['prix_jour'] ?></td>
                        <td><?= $dataVoiture['photo_voiture'] ?></td>
                        <td>
                        <i onclick="if(confirm('voulez vraiment supprimé ça ?'))window.location.href='supprimer.php?id=<?= $dataReser['id_reservation']?>'" class="fas fa-trash-alt"></i>
                        <i onclick="window.location.href='formulaire.php?id=<?= $data['id_form']?>'" class="fas fa-edit"></i>
                        </td>
                    </tr>
                    <?php endwhile;?> 
                </tbody>
            </table>
    </section>

    <section id="utilisateurs" class="dashboard-section" style="display: none;">
        <h3>Liste des Utilisateurs</h3>
        <table>
            <thead>
                <tr>
                    <th>Nom client</th>
                    <th>Prénom client </th>
                    <th>email client</th>
                    <th>téléphone client</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php while($data_User= $info_User->fetch_assoc()):?> 
                    <td><?= $data_User['nom_user']?></td>
                    <td><?= $data_User['prenom_user']?></td>
                    <td><?= $data_User['email_user']?></td>
                    <td><?= $data_User['tel_user']?></td>
                    <td>
                    <i onclick="if(confirm('voulez vraiment supprimé ça ?'))window.location.href='supprimer.php?id=<?= $dataReser['id_reservation']?>'" class="fas fa-trash-alt"></i>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </section>

    <section id="reservations" class="dashboard-section" style="display: none;">
            <h3>Liste des Réservations</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date de Début</th>
                        <th>Date de Fin </th>
                        <th>Date de Signature</th>
                        <th>Paiement</th>
                        <th>Numero_identite</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <?php while($dataReser = $info_Reser->fetch_assoc()):?>
                        <?php 
                        $dataContrat = $info_Contrat->fetch_assoc();
                        $dataPaiment = $info_Paiment->fetch_assoc();
                        if( $dataContrat && $dataPaiment): ?>   
                        <td><?= $dataReser['date_debut']?></td>
                        <td><?= $dataReser['date_fin']?></td>
                        <td><?= $dataContrat['date_signature']?></td>
                        <td><?= $dataPaiment['outil_paiment']?></td>
                        <td><?= $dataPaiment['numero_identite']?></td>
                        <td>
                        <i onclick="if(confirm('voulez vraiment supprimé ça ?'))window.location.href='supprimer.php?id=<?= $dataReser['id_reservation']?>'" class="fas fa-trash-alt"></i>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile;?> 
                </tbody>
            </table>
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

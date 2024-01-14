<?php
require __DIR__ . '/utils/header.php';

function getMatches($past = true) {
    $connexion = dbconnect();
    $dateCondition = $past ? "<" : ">";
    $orderBy = $past ? "DESC" : "ASC";

    // Modification de la requête pour inclure les noms des équipes
    $sql = "SELECT m.*, s.nom as salle_nom, e1.nom as equipe1_nom, e2.nom as equipe2_nom FROM `match` m 
            LEFT JOIN salle s ON m.salle_id = s.id 
            LEFT JOIN match_equipe me1 ON m.id = me1.match_id 
            LEFT JOIN equipe e1 ON me1.equipe_id = e1.id
            LEFT JOIN match_equipe me2 ON m.id = me2.match_id AND me1.equipe_id != me2.equipe_id
            LEFT JOIN equipe e2 ON me2.equipe_id = e2.id
            WHERE m.date $dateCondition NOW() 
            GROUP BY m.id
            ORDER BY m.date $orderBy";

    $query = $connexion->prepare($sql);
    $query->execute();
    $matches = $query->fetchAll(PDO::FETCH_ASSOC);
    $connexion = null;

    return $matches;
}

$pastMatches = getMatches(true);  // Récupérer les matchs passés
$futureMatches = getMatches(false);  // Récupérer les matchs futurs

// Exemple d'affichage des matchs passés
echo "<h2>Matchs Passés</h2>";
foreach ($pastMatches as $match) {
    echo "<p>";
    echo "Date: " . $match['date'] . "<br>";
    echo "Salle: " . $match['salle_nom'] . "<br>";
    echo "Équipe 1: " . $match['equipe1_nom'] . "<br>";
    echo "Équipe 2: " . $match['equipe2_nom'] . "<br>";
    // Autres détails...
    echo "</p>";
}

// Exemple d'affichage des matchs futurs
echo "<h2>Matchs Futurs</h2>";
foreach ($futureMatches as $match) {
    echo "<p>";
    echo "Date: " . $match['date'] . "<br>";
    echo "Salle: " . $match['salle_nom'] . "<br>";
    echo "Équipe 1: " . $match['equipe1_nom'] . "<br>";
    echo "Équipe 2: " . $match['equipe2_nom'] . "<br>";
    // Autres détails...
    echo "</p>";
}
?>
<link rel="stylesheet" href="../../front-end/css/events.css" type="text/css">
<div class="match-card">
    <div class="match-info">
        <div class="match-date">14 Janv</div>
        <div class="match-time">20:00</div>
    </div>
    <div class="teams">
        <div class="team-vs">
            <div class="team">
                <div class="team-logo" style="background-image: url('../../assets/images/jpeg/tappeurs.jpg');">
                    <
                </div>
                <div class="team-name">FC Metz</div>
            </div>
            <span class="vs">VS</span>
            <div class="team">
                <div class="team-logo" style="background-image: url('../../assets/images/jpeg/tappeurs.jpg');"></div>
                <div class="team-name">TEFCE</div>
            </div>
        </div>
        <div class="match-score">
            <span class="score">2</span>
            <span class="score">-</span>
            <span class="score">3</span>
        </div>
    </div>
</div>

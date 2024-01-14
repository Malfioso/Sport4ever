<?php
require __DIR__ . '/utils/header.php';

function getMatches($past = true) {
    $connexion = dbconnect();
    $dateCondition = $past ? "<" : ">";
    $orderBy = $past ? "DESC" : "ASC";

    // Modification de la requête pour inclure les noms des équipes
    $sql = "SELECT m.*, s.nom as salle_nom, e1.nom as equipe1_nom, e2.nom as equipe2_nom, 
        m.score_equipe_1, m.score_equipe_2 FROM `match` m 
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


?>

<link rel="stylesheet" href="../../front-end/css/events.css" type="text/css">



<div class="future-match-container">
    <?php foreach ($futureMatches as $match): ?>
    <div class="match-card">
        <div class="match-info">
            <div class="match-date"><?php echo date('d M', strtotime($match['date'])); ?></div>
            <div class="match-time"><?php echo date('H:i', strtotime($match['date'])); ?></div>
        </div>
        <div class="teams">
            <div class="team-vs">
                <div class="team">
                    <div class="team-logo">
                        <?php
                        $team1_logo = str_replace('les ', '', strtolower($match['equipe1_nom'])) . '.jpg';
                        ?>
                        <img src="../../assets/images/jpeg/<?php echo $team1_logo; ?>" alt="logo">
                    </div>
                    <div class="team-name"><?php echo htmlspecialchars($match['equipe1_nom']); ?></div>
                </div>
                <span class="vs">VS</span>
                <div class="team">
                    <div class="team-logo">
                        <?php
                        $team2_logo = str_replace('les ', '', strtolower($match['equipe2_nom'])) . '.jpg';
                        ?>
                        <img src="../../assets/images/jpeg/<?php echo $team2_logo; ?>" alt="logo">
                    </div>
                    <div class="team-name"><?php echo htmlspecialchars($match['equipe2_nom']); ?></div>
                </div>
            </div>
            <div class="match-score"></div>
        </div>
        <div class="match-location">
            <div class="location-icon">
                <img src="../../assets/images/svg/location.svg" alt="location">
            </div>
            <div class="location-name"><?php echo htmlspecialchars($match['salle_nom']); ?></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="past-match-container">
    <?php foreach ($pastMatches as $match): ?>
        <div class="match-card">
            <div class="match-info">
                <div class="match-date"><?php echo date('d M', strtotime($match['date'])); ?></div>
                <div class="match-time"><?php echo date('H:i', strtotime($match['date'])); ?></div>
            </div>
            <div class="teams">
                <div class="team-vs">
                    <div class="team">
                        <div class="team-logo">
                            <?php
                            $team1_logo = str_replace('les ', '', strtolower($match['equipe1_nom'])) . '.jpg';
                            ?>
                            <img src="../../assets/images/jpeg/<?php echo $team1_logo; ?>" alt="logo">
                        </div>
                        <div class="team-name"><?php echo htmlspecialchars($match['equipe1_nom']); ?></div>
                    </div>
                    <span class="vs">VS</span>
                    <div class="team">
                        <div class="team-logo">
                            <?php
                            $team2_logo = str_replace('les ', '', strtolower($match['equipe2_nom'])) . '.jpg';
                            ?>
                            <img src="../../assets/images/jpeg/<?php echo $team2_logo; ?>" alt="logo">
                        </div>
                        <div class="team-name"><?php echo htmlspecialchars($match['equipe2_nom']); ?></div>
                    </div>
                </div>
                <div class="match-score">
                    <span class="score-left"><?php echo htmlspecialchars($match['score_equipe_1']); ?></span>
                    <span class="score-span">-</span>
                    <span class="score-right"><?php echo htmlspecialchars($match['score_equipe_2']); ?></span>
                </div>
            </div>
            <div class="match-location">
                <div class="location-icon">
                    <img src="../../assets/images/svg/location.svg" alt="location">
                </div>
                <div class="location-name"><?php echo htmlspecialchars($match['salle_nom']); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


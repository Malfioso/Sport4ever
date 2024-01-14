<?php require __DIR__ . '/../../../back-end/utils/session.php'; ?>
<html lang="fr">
<head>
    <title>Sport4Ever</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../../front-end/css/header.css" type="text/css">
</head>
<script src="../../front-end/js/script_login_modal.js"></script>
<body>
<header>
    <nav class="navbar">
        <div class="nav-left">
            <button class="btn" id="media-btn">
                <img src="../../assets/images/svgs/nav_adherant.svg" alt="login">
            </button>
            <button class="btn" id="events-btn">
                <a href="events.php">
                    <img src="../../assets/images/svgs/nav_schedule.svg" alt="login">
                </a>
            </button>
            <button class="btn" id="download-btn">
                <img src="../../assets/images/svgs/nav_sponsor.svg" alt="login">
            </button>
        </div>
        <div class="nav-center">
            <a href="index.php">
            <img src="../../assets/images/png/nbfl_logo.png" alt="login">
            </a>
        </div>
        <div class="nav-right">
            <button class="btn" onclick="authenticate()" id="login-btn">
                <img src="../../assets/images/svgs/nav_login.svg" alt="login">
            </button>
            <button class="btn" id="research-btn">
                <img src="../../assets/images/svgs/nav_login.svg" alt="login">
            </button>
        </div>
    </nav>
</header>
<!-- Login Modal -->
<?php require __DIR__ . '/../auth/login.php'; ?>
<?php
require('header.php');
?>

<div class="container">
    <!-- Exemple d'événement 1 -->
    <div class="event">
        <img src="lien_vers_image_evenement1.jpg" alt="Image Événement 1">
        <div class="event-info">
            <div class="event-date">10/01/2024</div>
            <div>Description de l'événement 1...</div>
        </div>
    </div>

    <!-- Exemple d'événement 2 -->
    <div class="event">
        <img src="lien_vers_image_evenement2.jpg" alt="Image Événement 2">
        <div class="event-info">
            <div class="event-date">15/02/2024</div>
            <div>Description longue de l'événement 2 qui peut déclencher une barre de défilement...</div>
        </div>
    </div>

    <!-- Exemple d'événement 3 -->
    <div class="event">
        <img src="lien_vers_image_evenement3.jpg" alt="Image Événement 3">
        <div class="event-info">
            <div class="event-date">20/03/2024</div>
            <div>Description de l'événement 3...</div>
        </div>
    </div>
</div>

    <!-- Calandrier -->

<div class="container-match">
    <div class="calendar light">
        <div class="calendar_header">
            <h1 class = "header_title">Welcome Back</h1>
            <p class="header_copy"> Calendar Plan</p>
        </div>
        <div class="calendar_plan">
            <div class="cl_plan">
                <div class="cl_title">Today</div>
                <div class="cl_copy">22nd  April  2018</div>
                <div class="cl_add">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div>
        <div class="calendar_events">
            <p class="ce_title">Upcoming Events</p>
            <div class="event_item">
                <div class="ei_Dot dot_active"></div>
                <div class="ei_Title">10:30 am</div>
                <div class="ei_Copy">Monday briefing with the team</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">12:00 pm</div>
                <div class="ei_Copy">Lunch for with the besties</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">13:00 pm</div>
                <div class="ei_Copy">Meet with the client for final design <br> @foofinder</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">14:30 am</div>
                <div class="ei_Copy">Plan event night to inspire students</div>
            </div>
            <div class="event_item">
                <div class="ei_Dot"></div>
                <div class="ei_Title">15:30 am</div>
                <div class="ei_Copy">Add some more events to the calendar</div>
            </div>
        </div>
    </div>
    <div class="download-button-container">
        <button class="download-button">Télécharger</button>
    </div>
</div>
<?php
require('footer.php');
<?php require 'utils/header.php';?>
<link rel="stylesheet" href="../../front-end/css/member.css" type="text/css">
<div class="member_banner">
    <img src="" alt="banner">
<div>
<div class="member_header">
    <div class="profile_picture">
        <div class="profile_picture_image">
            <img src="../../assets/images/jpeg/<?php ?>" alt="photo">
        </div>
        <div class="profile_picture_edit">
            <img src="../../assets/images/svg/edit.svg" alt="modifier">
        </div>
    </div>
</div>
<div class="member_info_left">
</div>
<div class="member_info_right">
    <div class="member_info_right_header">
        <h2>Informations personnelles</h2>
        <p>n'hésitez pas à les changer</p>
    </div>
    <div class="member_info_right_content">
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Nom</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['nom']); ?></p>
            </div>
        </div>
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Prénom</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['prenom']); ?></p>
            </div>
        </div>
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Adresse</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['adresse']); ?></p>
            </div>
        </div>
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Code postal</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['code_postal']); ?></p>
            </div>
        </div>
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Ville</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['ville']); ?></p>
            </div>
        </div>
        <div class="member_info_right_content_row">
            <div class="member_info_right_content_row_left">
                <p>Téléphone</p>
            </div>
            <div class="member_info_right_content_row_right">
                <p><?php echo htmlspecialchars($member['telephone']); ?></
            </div>
        </div>
</div>

<?php 
    declare(strict_types = 1);

    session_start();

    if (isset($_SESSION['user_id'])) {
        die(header('Location: ../pages/profile.php'));
    }

    require_once('../database/connection.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/forms.tpl.php');

    /*output_header();
    output_mainpage();
    output_footer();*/
    header('Location: ../pages/login.php');
?>
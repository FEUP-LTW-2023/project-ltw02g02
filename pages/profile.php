<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/profile.tpl.php');

    $edit = isset($_GET['edit']);
    $user_type = $_SESSION['user_type'];

    output_header();
    output_profile($edit, $user_type);
    output_footer();
?>
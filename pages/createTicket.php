<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/department.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/forms.tpl.php');

    $dbh = getDatabaseConnection();
    $departments = getAllDepartments($dbh);

    output_header();
    output_createTicket($departments);
    output_footer();
?>
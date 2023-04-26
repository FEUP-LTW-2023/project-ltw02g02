<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../database/department.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/forms.tpl.php');
    require_once('../templates/admin.tpl.php');

    $dbh = getDatabaseConnection();
    $clients = getAllClientsAndAgents($dbh);
    $departments = getAllDepartments($dbh);
    $agents = getAllAgents($dbh);

    output_header();
    output_adminControl($clients, $departments, $agents);
    output_footer();
?>
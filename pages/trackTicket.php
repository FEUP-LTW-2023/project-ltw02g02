<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../database/department.db.php');
    require_once('../database/status.db.php');
    require_once('../database/user.db.php');
    //require_once('../database/hashtag.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/ticket.tpl.php');

    $ticket_id = intval($_GET['id']);
    $_SESSION['ticket_id'] = $ticket_id;
    $edit = isset($_GET['edit']);;

    $dbh = getDatabaseConnection();
    $ticket = getTicket($dbh, $ticket_id);
    $statuses = getAllStatus($dbh);
    $departments = getAllDepartments($dbh);
    $agents = getAllAgents($dbh);
    $hashtags = [0,1,2]; //getAllhashtags($dbh);


    output_header();
    if ($_SESSION['user_type'] !== 'Client') output_trackEditTicket($ticket, $edit, $statuses, $departments, $agents, $hashtags);
    else output_trackTicket($ticket);
    output_footer();
?>
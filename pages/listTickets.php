<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/ticket.tpl.php');

    $dbh = getDatabaseConnection();
    $user_type = $_SESSION['user_type'];
    $tickets = [];

    $clientTickets = getAllTicketsByUser($dbh, intval($_SESSION['user_id']));
    if ($user_type === 'Agent') {
        $tickets = getAllTicketsByDepartment($dbh, intval($_SESSION['user_depart_id']));
    } else if ($user_type === 'Admin') {
        $tickets = getAllTickets($dbh);
    }

    output_header();
    output_listClientTickets($clientTickets, $user_type);
    if ($user_type !== 'Client') output_listAgentTickets($tickets);
    output_footer();
?>
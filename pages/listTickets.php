<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/ticket.tpl.php');

    $dbh = getDatabaseConnection();
    if ($_SESSION['user_type'] == 'Client') {
        $tickets = getAllTicketsByUser($dbh, intval($_SESSION['user_id']));
    } else if ($_SESSION['user_type'] == 'Agent') {
        $tickets = getAllTicketsByAgent($dbh, intval($_SESSION['depart_id']));
    } else {
        $tickets = getAllTickets($dbh);
    }

    output_header();
    output_listTickets($tickets);
    output_footer();
?>
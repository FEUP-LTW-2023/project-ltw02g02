<?php 
    declare(strict_types = 1);

    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../templates/common.tpl.php');
    require_once('../templates/ticket.tpl.php');

    $ticket_id = intval($_GET['id']);
    $edit = $_GET['edit'];
    $dbh = getDatabaseConnection();
    $ticket = getTicket($dbh, $ticket_id);


    output_header();
    output_ticket($ticket, $edit);
    output_footer();
?>
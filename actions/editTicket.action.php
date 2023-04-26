<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../classes/ticket.class.php');
    require_once('../utils/validation.php');

    $ticket_id = $_SESSION['ticket_id'];

    $status_id = intval($_POST['status']);
    if (!empty($_POST['department'])) $depart_id = intval($_POST['department']);
    else $depart_id = NULL;
    if (!empty($_POST['agent'])) $agent_id = intval($_POST['agent']);
    else $agent_id = NULL;
    $priority = $_POST['priority'];
    $hashtag = $_POST['hashtag'];
    $inquiry = $_POST['inquiry'];

    $updated = new DateTime(date('Y-m-d H:i:s'));

    //FAZER A VALIDAÇÃO DOS INPUTS!!!!!!!!!!!!

    if (isset($agent_id) && $status_id == 1) {
        $status_id = 2;
    }

    $ticket = new Ticket($ticket_id, NULL, NULL, $status_id, $depart_id, NULL, $agent_id, $priority, $hashtag, NULL, $updated);
    $dbh = getDatabaseConnection();
    if (!editTicket($dbh, $ticket)) {
        echo 'Ticket could not be edited';
        die(header("Location: ../pages/trackTicket.php?id=$ticket_id&edit"));
    }

    header("Location: ../pages/trackTicket.php?id=$ticket_id");
?>
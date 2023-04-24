<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/ticket.db.php');
    require_once('../classes/ticket.class.php');
    require_once('../utils/validation.php');

    $subject = $_POST['subject'];
    $description = $_POST['description'];
    if (!empty($_POST['department'])) {
        $department = intval($_POST['department']);
    } else {
        $department = NULL;
    }
    $user_id = $_SESSION['user_id'];

    //FAZER A VALIDAÇÃO DOS INPUTS!!!!!!!!!!!!

    $ticket = new Ticket($subject, $description, $department, $user_id);
    $dbh = getDatabaseConnection();
    if (!createTicket($dbh, $ticket)) {
        echo 'Ticket could not be created';
        die(header('Location: ../pages/createTicket.php'));
    }

    header('Location: ../pages/profile.php');
?>

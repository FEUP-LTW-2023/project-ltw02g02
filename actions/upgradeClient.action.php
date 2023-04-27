<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../utils/validation.php');


    if (empty($_POST['client_id']) || empty($_POST['user_type'])) {
        die(header('Location: ../pages/adminControl.php'));
    }

    $client_id = intval($_POST['client_id']);
    $user_type = $_POST['user_type'];

    $dbh = getDatabaseConnection();
    $client = getUserByID($dbh, $client_id);
    if ($client['user_type'] === $user_type) {
        echo 'It should be a upgrade';
        die(header('Location: ../pages/adminControl.php'));
    }

    if (!upgradeClient($dbh, $client_id, $user_type)) {
        echo 'Client could not be updated';
        die(header('Location: ../pages/adminControl.php'));
    }

    header('Location: ../pages/adminControl.php');
?>

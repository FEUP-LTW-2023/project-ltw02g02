<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../utils/validation.php');

    if (empty($_POST['department_id']) || empty($_POST['agent_ids'])) {
        die(header('Location: ../pages/adminControl.php'));
    }

    $depart_id = intval($_POST['department_id']);
    $agent_ids = $_POST['agent_ids'];

    foreach ($agent_ids as $agent_id) {
        $dbh = getDatabaseConnection();
        if (!assignAgentToDepart($dbh, intval($agent_id), $depart_id)) {
            echo 'Agent could not be assigned';
        }
    }

    header('Location: ../pages/adminControl.php');
?>

<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/status.db.php');
    require_once('../database/department.db.php');
    require_once('../database/hashtag.db.php');
    require_once('../utils/validation.php');

    $entity_type = $_POST['entity_type'];
    $entity_name = $_POST['entity_name'];

    //FAZER A VALIDAÇÃO DOS INPUTS!!!!!!!!!!!!
    
    if (empty($entity_type) || empty($entity_name)) {
        die(header('Location: ../pages/adminControl.php'));
    }

    $dbh = getDatabaseConnection();
    if ($entity_type === 'department') {
        if (!addDepartment($dbh, $entity_name)) {
            echo 'Department could not be added';
            die(header('Location: ../pages/adminControl.php'));
        }
    } else if ($entity_type === 'status') {
        if (!addStatus($dbh, $entity_name)) {
            echo 'Status could not be added';
            die(header('Location: ../pages/adminControl.php'));
        }
    } else if ($entity_type === 'hashtag') {
        if (!addHashtag($dbh, $entity_name)) {
            echo 'Hashtag could not be added';
            die(header('Location: ../pages/adminControl.php'));
        }
    }

    header('Location: ../pages/adminControl.php');
?>

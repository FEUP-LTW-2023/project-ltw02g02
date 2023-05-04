<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../utils/validation.php');

    $current_password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id'];

    $dbh = getDatabaseConnection();
    $user = getUserByID($dbh, $user_id);

    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    if (!password_verify($current_password, $user['user_password'])) {
        echo 'Current password is wrong';
        die(header('Location: ../pages/changePassword.php'));
    }

    if (!password_validation($new_password)) {
        echo 'New password is not valid';
        die(header('Location: ../pages/changePassword.php'));
    }

    if (!password_verify($confirm_password, $hashed_new_password)) {
        echo 'The password confirmation does not match';
        die(header('Location: ../pages/changePassword.php'));
    }

    if (!changePassword($dbh, $user_id, $hashed_new_password)) {
        echo 'Password could not be updated';
        die(header('Location: ../pages/changePassword.php'));
    }

    header('Location: ../pages/profile.php');
?>

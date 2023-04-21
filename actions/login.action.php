<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../utils/validation.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!username_validation($username)) {
        echo 'Invalid username';
        die(header('Location: ../pages/login.php'));
    }

    if (!password_validation($password)) {
        echo 'Invalid password';
        die(header('Location: ../pages/login.php'));
    }

    $dbh = getDatabaseConnection();
    $user = getUserByUsername($dbh, $username);

    if (!$user) {
        echo 'Invalid username';
        die(header('Location: ../pages/login.php'));
    }

    if (!password_verify($password, $user['user_password'])) {
        echo 'Invalid password';
        die(header('Location: ../pages/login.php'));
    }

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['user_depart_id'] = $user['depart_id'];
    
    header('Location: ../pages/index.php');
?>

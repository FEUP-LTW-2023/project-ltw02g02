<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../classes/user.class.php');
    require_once('../utils/validation.php');

    $id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (!name_validation($name)) {
        echo 'Invalid name';
        die(header('Location: ../pages/profile.php?edit'));
    }

    if (!username_validation($username)) {
        echo 'Invalid username';
        die(header('Location: ../pages/profile.php?edit'));
    }

    if (!email_validation($email)) {
        echo 'Invalid email';
        die(header('Location: ../pages/profile.php?edit'));
    }

    $user = new User($id, $name, $username, $email);

    $dbh = getDatabaseConnection();
    if (!editProfile($dbh, $user)) {
        echo 'Profile could not be edited';
        die(header('Location: ../pages/profile.php?edit'));
    }

    $_SESSION['user_name'] = $name;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    header('Location: ../pages/profile.php');
?>
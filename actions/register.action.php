<?php
    declare(strict_types = 1);
    session_start();

    require_once('../database/connection.db.php');
    require_once('../database/user.db.php');
    require_once('../utils/validation.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!name_validation($name)) {
        echo 'Invalid name';
        die(header('Location: ../pages/register.php'));
    }

    if (!username_validation($username)) {
        echo 'Invalid username';
        die(header('Location: ../pages/register.php'));
    }

    if (!email_validation($email)) {
        echo 'Invalid email';
        die(header('Location: ../pages/register.php'));
    }

    if (!password_validation($password)) {
        echo 'Invalid password';
        die(header('Location: ../pages/register.php'));
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $dbh = getDatabaseConnection();
    if (!registerUser($dbh, $name, $username, $email, $hashed_password)) {
        echo 'User could not be register';
        die(header('Location: ../pages/register.php'));
    }

    header('Location: ../pages/index.php'); 
?>
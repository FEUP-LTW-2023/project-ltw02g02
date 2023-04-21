<?php
    declare(strict_types = 1);

    function registerUser(PDO $dbh, $name, $username, $email, $hashed_password) {
        try {
            $stmt = $dbh->prepare('INSERT INTO User (user_name, username, email, user_password, user_type) VALUES (:user_name, :username, :email, :user_password, "Client")');
            
            $stmt->bindParam(':user_name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':user_password', $hashed_password);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

    function getUserByUsername(PDO $dbh, $username) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM User WHERE username = ?');
            $stmt->execute(array($username));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $user = $stmt->fetch();

        return $user;
    }



?>
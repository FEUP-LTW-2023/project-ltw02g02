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
            $stmt = $dbh->prepare('SELECT * FROM User LEFT JOIN Department ON user_depart_id = depart_id WHERE username = ?');
            
            $stmt->execute(array($username));

            $user = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $user;
    }

    function getUserByID(PDO $dbh, $user_id) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM User LEFT JOIN Department ON user_depart_id = depart_id WHERE user_id = ?');
            
            $stmt->execute(array($user_id));

            $user = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $user;
    }

    function editProfile($dbh, $user) {
        try {
        $stmt = $dbh->prepare('UPDATE User SET user_name = :user_name, username = :username, email = :email WHERE user_id = :user_id');
        
        $stmt->bindParam(':user_name', $user->name);
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':user_id', $user->id);

        $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

    function getAllAgents(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM User WHERE user_type != ?');
            
            $stmt->execute(array('Client'));

            $agents = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $agents;
    }

    function getAllClientsAndAgents(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM User WHERE user_type != ? ORDER BY user_name');
            
            $stmt->execute(array('Admin'));

            $clients = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $clients;
    }

    function upgradeClient($dbh, $user_id, $user_type) {
        try {
            $stmt = $dbh->prepare('UPDATE User SET user_type = :user_type WHERE user_id = :user_id');
            
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':user_type', $user_type);
    
            $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit(0);
            }
    
            return true;
        }

    function assignAgentToDepart($dbh, $agent_id, $depart_id) {
        try {
            $stmt = $dbh->prepare('UPDATE User SET user_depart_id = :user_depart_id WHERE user_id = :user_id');
            
            $stmt->bindParam(':user_id', $agent_id);
            $stmt->bindParam(':user_depart_id', $depart_id);
    
            $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit(0);
            }
    
            return true;
        }
?>

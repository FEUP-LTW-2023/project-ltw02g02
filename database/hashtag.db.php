<?php
    declare(strict_types = 1);

    function getAllHashtags(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Hashtag');
            
            $stmt->execute();

            $statuses = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statuses;
    }

    function addHashtag(PDO $dbh, $hashtag_name) {
        try {
            $stmt = $dbh->prepare('INSERT INTO Hashtag (hashtag_name) VALUES (:hashtag_name)');

            $stmt->bindParam(':hashtag_name', $hashtag_name);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }
?>

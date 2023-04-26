<?php
    declare(strict_types = 1);

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
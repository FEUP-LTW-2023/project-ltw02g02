<?php
    declare(strict_types = 1);

    function getAllStatus(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM TicketStatus');
            
            $stmt->execute();

            $statuses = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $statuses;
    }

    function addStatus(PDO $dbh, $status_name) {
        try {
            $stmt = $dbh->prepare('INSERT INTO TicketStatus (status_name) VALUES (:status_name)');

            $stmt->bindParam(':status_name', $status_name);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

?>
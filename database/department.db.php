<?php
    declare(strict_types = 1);

    function getAllDepartments(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Department ORDER BY depart_name');
            
            $stmt->execute();

            $departments = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $departments;
    }

    function addDepartment($dbh, $depart_name) {
        try {
            $stmt = $dbh->prepare('INSERT INTO Department (depart_name) VALUES (:depart_name)');

            $stmt->bindParam(':depart_name', $depart_name);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(0);
        }

        return true;
    }

?>
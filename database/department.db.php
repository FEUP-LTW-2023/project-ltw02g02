<?php
    declare(strict_types = 1);

    function getAllDepartments(PDO $dbh) {
        try {
            $stmt = $dbh->prepare('SELECT * FROM Department GROUP BY depart_name');
            
            $stmt->execute();

            $departments = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $departments;
    }

?>
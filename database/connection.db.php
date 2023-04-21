<?php
declare(strict_types = 1);

function getDatabaseConnection() {

    try {
    $dbh = new PDO("sqlite:../database/database.db");
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
    }

    return $dbh;
}
?>

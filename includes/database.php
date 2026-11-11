<?php
$dsn = 'mysql:host=localhost;dbname=campus_lost_found';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // fetch() and fetchAll() return rows keyed by column name by default.
    ]);
} catch (PDOException $e) {
    $error = $e->getMessage();
    echo "Database connection error: $error";
    exit;
}



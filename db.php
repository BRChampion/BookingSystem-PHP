<?php
// Add credentials for the DB
$dsn = "mysql:host=localhost;dbname=BookingSystem;charset=utf8";
$user = "root";
$password = "password";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    exit("Database connection failed: " . $e->getMessage());
}

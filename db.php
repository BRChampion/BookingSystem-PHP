<?php
$dsn = "mysql:host=localhost;dbname=BookingSystem;charset=utf8";
$user = "root";
$password = "password";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

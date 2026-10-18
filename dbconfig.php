<?php
// Database connection, loaded by the other files with require
$host = 'localhost';
$db   = 'cybersecurity_jobs_db';
$user = 'root';   // XAMPP default
$pass = '';       // XAMPP default (empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
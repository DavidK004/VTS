<?php
require_once 'config.php';

function connectDb() {
    try {
        $dsn = "mysql:host=" . DB_CONFIG['host'] . ";dbname=" . DB_CONFIG['dbname'] . ";charset=utf8";
        $pdo = new PDO($dsn, DB_CONFIG['user'], DB_CONFIG['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>

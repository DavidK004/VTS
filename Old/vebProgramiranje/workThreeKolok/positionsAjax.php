<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['id_worker'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

require 'db-config.php';

$stmt = $pdo->query('SELECT id_position, name FROM positions ORDER BY name ASC');
$positions = $stmt->fetchAll();

echo json_encode($positions);

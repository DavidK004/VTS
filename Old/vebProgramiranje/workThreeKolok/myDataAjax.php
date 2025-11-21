<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['id_worker'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

require 'db-config.php';

$id_worker = $_SESSION['id_worker'];

$stmt = $pdo->prepare("
SELECT w.name, w.email, w.username, w.salary, p.name AS position_name
FROM worker w
JOIN positions p ON w.id_position = p.id_position
WHERE w.id_worker = ?
");
$stmt->execute([$id_worker]);
$user = $stmt->fetch();

if (!$user) {
    echo json_encode(['error' => 'User not found']);
    exit;
}

echo json_encode($user);

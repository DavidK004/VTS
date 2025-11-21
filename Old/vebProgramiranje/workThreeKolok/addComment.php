<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['id_worker'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

require 'db-config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$comment = trim($_POST['comment'] ?? '');

if (strlen($comment) < 10) {
    echo json_encode(['error' => 'Comment must be at least 10 characters long']);
    exit;
}

$id_worker = $_SESSION['id_worker'];

$stmt = $pdo->prepare('INSERT INTO comment (id_worker, comment) VALUES (?, ?)');
try {
    $stmt->execute([$id_worker, $comment]);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Database error']);
}

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

require 'db-config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
    header('Location: index.php?error=emptyfields');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM worker WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
    header('Location: index.php?error=invalidlogin');
    exit;
}

// Login success
$_SESSION['id_worker'] = $user['id_worker'];
$_SESSION['is_admin'] = (bool)$user['is_admin'];

// Redirect to dashboard or admin page
header('Location: dashboard.php');
exit;

<?php
session_start();
require 'db-config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
    echo "Both fields are required.";
    exit;
}

// Fetch user by username
$stmt = $pdo->prepare("SELECT * FROM worker WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // Password correct, set session
    $_SESSION['id_worker'] = $user['id_worker'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['is_admin'] = $user['is_admin'];
    $_SESSION['name'] = $user['name'];
    header("Location: myData.php"); // redirect after login
    exit;
} else {
    echo "Invalid username or password.";
}

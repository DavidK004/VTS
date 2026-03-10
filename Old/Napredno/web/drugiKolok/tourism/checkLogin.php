<?php
session_start();
require 'config.php';
require 'functions.php';

$pdo = connectToDatabase(DB_CONFIG);

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
    header("Location: index.php?error=Invalid credentials");
    exit;
}

$_SESSION['id_user'] = $user['id_user'];
$_SESSION['role'] = $user['role'];
$_SESSION['name'] = $user['name'];

if ($user['role'] == 'admin') {
    header("Location: admins.php");
} else {
    header("Location: tours.php");
}
exit;
?>

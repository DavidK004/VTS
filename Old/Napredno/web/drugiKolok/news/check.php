<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['error'] = "Pogrešni podaci!";
    header("Location: index.php");
    exit;
}

$_SESSION['id_user'] = $user['id_user'];
$_SESSION['role'] = $user['role'];
header("Location: menu.php");
exit;

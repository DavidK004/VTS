<?php
//session_set_cookie_params([
//    'lifetime' => 0,
//    'path' => '/',
//    'secure' => false,
//    'httponly' => true,
//    'samesite' => 'Lax' // or 'None' if you are using HTTPS
//]);
session_start();
require 'config.php';
require 'db_config.php';
require 'functions_def.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$data = checkUserLogin($username, $password, $connection);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['id_user'] = $data['id'];
    echo "Welcome " . htmlspecialchars($data['username']) . "<br>";
    echo '<a href="logout.php">Logout</a>';
} else {
    redirection("index.php?l=1");
}
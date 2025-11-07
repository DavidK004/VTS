<?php
session_start();
require 'db_config.php';
require "functions_def.php";

$sd = "";
$username = "";
$password = "";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$data = checkUserLogin($username, $password);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['age'] = 22;
    $_SESSION['cart'][123] = 1;
    $_SESSION['cart'][23] = 31;
    unset($_SESSION['cart']);
    echo "Welcome " . $data['username'] . "<br>";
    echo '<a href="logout.php">logout</a>';
} else {
    redirection("index.php?l=1");
    exit();
}
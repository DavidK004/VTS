<?php
session_start();
require 'config.php';
require 'db_config.php';
require "functions_def.php";

$sd = "";
$username = "";
$password = "";

if(isset($_POST['username'])) {
    $username = mysqli_real_escape_string($connection,$_POST['username']);
}

if(isset($_POST['password'])) {
    $password = mysqli_real_escape_string($connection,$_POST['password']);
}

$data = checkUserLogin($username, $password);

//var_dump($data);
if($data) {
    $_SESSION['username'] = $data['username'];
    echo "Welcome ".$data['username']. "<br>";
    echo '<a href="logout.php">logout</a>';
}
else {
    redirection("index.php?l=1");
    exit();
}
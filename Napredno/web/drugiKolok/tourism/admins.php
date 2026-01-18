<?php
session_start();
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}
?>

<p>You are logged as <?=htmlspecialchars($_SESSION['name'])?></p>
<a href="new_destination.php">New Destination</a> | <a href="logout.php">Logout</a>

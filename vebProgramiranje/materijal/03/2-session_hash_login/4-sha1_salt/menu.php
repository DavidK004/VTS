<?php
session_start();
require_once 'config.php';
require_once 'db_config.php';
require_once 'functions_def.php';
if (!isset($_SESSION['username']) OR !isset($_SESSION['id_user']) OR !is_int($_SESSION['id_user'])) {
    redirection('index.php?l=0');
} else {
    echo "<h1>Welcome to our web site</h1>";
    echo '<a href="logout.php">logout</a>';
}
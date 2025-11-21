<?php
session_start();

if (!isset($_SESSION['id_worker'])) {
    header("Location: index.php"); // redirect to login if not logged in
    exit;
}

// Optional: check if user is admin
$isAdmin = $_SESSION['is_admin'] ?? 0;
?>

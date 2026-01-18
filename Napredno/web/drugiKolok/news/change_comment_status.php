<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$status = $_GET['status'] ?? '';
if ($id && in_array($status, ['private', 'public'])) {
    $stmt = $pdo->prepare("UPDATE comments SET status=? WHERE id_comment=?");
    $stmt->execute([$status, $id]);
}

header("Location: all_comments.php");
exit;

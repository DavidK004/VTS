<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['id_developer'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] === 'admin') {
    header("Location: admins.php");
    exit();
}

$pdo = connectDb();
$stmt = $pdo->prepare("SELECT * FROM developers WHERE id_developer = :id");
$stmt->execute([':id' => $_SESSION['id_developer']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>My Data</h2>
<p><strong>Name:</strong> <?= $user['name'] ?></p>
<p><strong>Username:</strong> <?= $user['username'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<p><strong>Position:</strong> <?= $user['position'] ?></p>
<p><strong>Salary:</strong> <?= $user['salary'] ?></p>
<p><strong>Role:</strong> <?= $user['role'] ?></p>

<a href="logout.php">Logout</a>

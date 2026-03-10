<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<h2>Admin Panel</h2>
<p>You are logged in as <?= $_SESSION['name'] ?></p>
<ul>
    <li><a href="positions.php">Positions</a></li>
    <li><a href="new_project.php">New Projects</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

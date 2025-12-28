<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photos</title>
</head>
<body>
    <h1>Welcome to our site</h1>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
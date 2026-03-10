<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['level'] !== 'admin') {
    header('Location: index.php');
    exit;
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <p>You are logged as <?php echo htmlspecialchars($name); ?></p>

    <ul>
        <li><a href="new_photo.php">Add New Photo</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
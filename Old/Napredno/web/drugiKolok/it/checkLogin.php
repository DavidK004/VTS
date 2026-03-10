<?php
session_start();
require_once 'db_config.php';

if (!isset($_POST['username'], $_POST['password'])) {
    die("Invalid request");
}

$username = $_POST['username'];
$password = $_POST['password'];
$pdo = connectDb();

// Fetch user
$stmt = $pdo->prepare("SELECT * FROM developers WHERE username = :username");
$stmt->execute([':username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($password, $user['password'])) {
    // Log wrong login
    $logStmt = $pdo->prepare("INSERT INTO logs (username, password) VALUES (:username, :password)");
    $logStmt->execute([':username' => $username, ':password' => $password]);

    $_SESSION['login_error'] = "Invalid username or password!";
    header("Location: index.php");
    exit();
}

// Successful login
$_SESSION['id_developer'] = $user['id_developer'];
$_SESSION['role'] = $user['role'];
$_SESSION['name'] = $user['name'];

if ($user['role'] === 'admin') {
    header("Location: admins.php");
} else {
    header("Location: my_data.php");
}
exit();
?>
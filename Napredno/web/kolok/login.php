<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $pdo = connectDatabase($dsn, $pdoOptions);


        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            $stmt = $pdo->prepare("INSERT INTO errors (username, password, date_time) VALUES (:username, :password, NOW())");
            $stmt->execute([
                ':username' => $username,
                ':password' => $password
            ]);

            $_SESSION['login_error'] = "Neispravno korisničko ime ili lozinka.";
            header('Location: index.php');
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO logs (id_user, date_time_added) VALUES (:id_user, NOW())");
        $stmt->execute([':id_user' => $user['id_user']]);

        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['level'] = $user['level'];
        $_SESSION['name'] = $user['username'];

        if ($user['level'] === 'admin') {
            header('Location: admins.php');
        } else {
            header('Location: photos.php');
        }
        exit;

    } catch (PDOException $e) {
        die("Greška: " . $e->getMessage());
    }
} else {
    header('Location: index.php');
    exit;
}
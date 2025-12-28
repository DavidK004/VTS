<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id_user'];
    $category = $_POST['category'] ?? '';
    $description = trim($_POST['description'] ?? '');
    $photo = $_FILES['photo'] ?? null;

    if (empty($category) || empty($description) || !$photo || $photo['error'] !== 0) {
        header('Location: new_photo.php');
        exit;
    }

    $imageType = exif_imagetype($photo['tmp_name']);
    if ($imageType !== IMAGETYPE_PNG) {
        header('Location: new_photo.php');
        exit;
    }

    $uploadDir = 'photos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $timestamp = time();
    $randNum = rand(100, 500);
    $newFileName = $timestamp . '-' . $randNum . '-' . $userId . '.png';
    $destination = $uploadDir . $newFileName;

    if (!move_uploaded_file($photo['tmp_name'], $destination)) {
        header('Location: new_photo.php');
        exit;
    }

    try {
        $pdo = connectDatabase($dsn, $pdoOptions);
        $stmt = $pdo->prepare("
            INSERT INTO photos (id_user, id_category, file, description, date_time_added)
            VALUES (:id_user, :id_category, :file, :description, NOW())
        ");
        $stmt->execute([
            ':id_user' => $userId,
            ':id_category' => $category,
            ':file' => $newFileName,
            ':description' => $description
        ]);

        header('Location: photos.php');
        exit;

    } catch (PDOException $e) {
        die("Greška: " . $e->getMessage());
    }

} else {
    header('Location: new_photo.php');
    exit;
}
<?php
session_start();
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$pdo = connectToDatabase(DB_CONFIG);

// Provera da li su svi podaci poslati
if (
    empty($_POST['status']) || empty($_POST['title']) || empty($_POST['description']) ||
    empty($_POST['id_category']) || empty($_POST['id_city']) || empty($_FILES['image']['name'])
) {
    header("Location: new_destination.php?error=All fields are required");
    exit;
}

// Provera tipa fajla (samo JPG)
$exif = exif_imagetype($_FILES['image']['tmp_name']);
if ($exif != IMAGETYPE_JPEG) {
    header("Location: new_destination.php?error=Invalid image type");
    exit;
}

// Upload slike
$time = time();
$randNum = rand(1000, 5000);
$userId = $_SESSION['id_user'];
$imageName = "$time-$randNum-$userId.jpg";
move_uploaded_file($_FILES['image']['tmp_name'], "images/$imageName");

// Unos u tabelu destinations
$stmt = $pdo->prepare("INSERT INTO destinations 
    (id_user, id_category, id_city, title, description, image, status) 
    VALUES (?,?,?,?,?,?,?)");
$stmt->execute([
    $userId,
    $_POST['id_category'],
    $_POST['id_city'],
    $_POST['title'],
    $_POST['description'],
    $imageName,
    $_POST['status']
]);

// Povećaj popularnost kategorije za 1
$pdo->prepare("UPDATE categories SET popularity = popularity + 1 WHERE id_category = ?")
    ->execute([$_POST['id_category']]);

header("Location: admins.php?success=Destination added");
exit;
?>
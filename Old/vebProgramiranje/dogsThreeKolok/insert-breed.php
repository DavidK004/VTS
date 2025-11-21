<?php
require_once 'db-config.php';


$breedName = $_POST['breed-select'] ?? null;
$description = $_POST['breed_description'] ?? null;

if ($breedName && $description) {
    $sql = 'INSERT INTO descriptions (breed_id,description,date_added) VALUES(?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$breedName, $description, date("Y/m/d")]);

    echo "<script>alert('Description successfully added!'); window.location.href = 'index.php';</script>";
} else{
    echo "<script>alert('Description failed to be added!'); window.location.href = 'index.php';</script>";
}
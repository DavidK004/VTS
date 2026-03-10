<?php
session_start();
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$pdo = connectToDatabase(DB_CONFIG);

// Dohvati sve kategorije i gradove
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
$cities = $pdo->query("SELECT * FROM cities")->fetchAll();
?>

<form action="add_new_destination.php" method="post" enctype="multipart/form-data">
    <label>Status:</label>
    <input type="radio" name="status" value="private" required> Private
    <input type="radio" name="status" value="public" required> Public
    <br><br>

    <label>Title:</label>
    <input type="text" name="title" required><br><br>

    <label>Description:</label>
    <textarea name="description" required></textarea><br><br>

    <label>Category:</label>
    <select name="id_category" required>
        <option value="">--Select--</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?=$cat['id_category']?>"><?=htmlspecialchars($cat['name'])?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>City:</label>
    <select name="id_city" required>
        <option value="">--Select--</option>
        <?php foreach ($cities as $city): ?>
            <option value="<?=$city['id_city']?>"><?=htmlspecialchars($city['name'])?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Image (JPG only):</label>
    <input type="file" name="image" accept="image/jpeg" required><br><br>

    <button type="submit">Add Destination</button>
</form>

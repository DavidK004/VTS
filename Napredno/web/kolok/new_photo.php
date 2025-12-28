<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: index.php');
    exit;
}

$pdo = connectDatabase($dsn, $pdoOptions);
$stmt = $pdo->query("SELECT id_category, name FROM categories ORDER BY name");
$categories = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Photo</title>
</head>

<body>
    <h1>Add New Photo</h1>
    <form action="add_photo.php" method="post" enctype="multipart/form-data">
        <label for="category">Category:</label><br>
        <select name="category" id="category" required>
            <option value="">--Select Category--</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo htmlspecialchars($cat['id_category']); ?>">
                    <?php echo htmlspecialchars($cat['name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="4" cols="50" required></textarea><br><br>

        <label for="photo">Select PNG photo:</label><br>
        <input type="file" name="photo" id="photo" accept="image/png" required><br><br>

        <input type="submit" value="Upload Photo">
    </form>
    <p><a href="logout.php">Logout</a></p>
</body>

</html>
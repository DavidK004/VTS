<?php
session_start();
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

$pdo = connectToDatabase(DB_CONFIG);

// Dohvati sve public destinacije sa imenom korisnika, kategorijom i gradom
$stmt = $pdo->query("
    SELECT d.title, d.description, d.image, u.name AS author, c.name AS category, ci.name AS city
    FROM destinations d
    JOIN users u ON d.id_user = u.id_user
    JOIN categories c ON d.id_category = c.id_category
    JOIN cities ci ON d.id_city = ci.id_city
    WHERE d.status='public'
    ORDER BY d.date_time_added DESC
");
$destinations = $stmt->fetchAll();
?>

<h2>Welcome,
    <?= htmlspecialchars($_SESSION['name']) ?>
</h2>
<a href="logout.php">Logout</a>
<hr>

<?php foreach ($destinations as $dest): ?>
    <h3>
        <?= htmlspecialchars($dest['title']) ?>
    </h3>
    <img src="images/<?= htmlspecialchars($dest['image']) ?>" alt="<?= htmlspecialchars($dest['title']) ?>" width="300"><br>
    <b>Description:</b>
    <?= htmlspecialchars($dest['description']) ?><br>
    <b>Category:</b>
    <?= htmlspecialchars($dest['category']) ?><br>
    <b>City:</b>
    <?= htmlspecialchars($dest['city']) ?><br>
    <b>Added by:</b>
    <?= htmlspecialchars($dest['author']) ?>
    <hr>
<?php endforeach; ?>
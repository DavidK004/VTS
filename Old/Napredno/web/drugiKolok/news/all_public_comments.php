<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user'])) {
    $_SESSION['error'] = "Morate biti prijavljeni!";
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT c.*, u.name, p.title
                       FROM comments c
                       JOIN users u ON c.id_user = u.id_user
                       JOIN posts p ON c.id_post = p.id_post
                       WHERE  c.work_status='accepted' AND c.status='public'
                       ORDER BY c.date_time_added DESC");
$stmt->execute();
$comments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>

<body>
    <h2>All Public Comments</h2>
    <table border="1">
        <tr>
            <th>User</th>
            <th>Post</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
        <?php foreach ($comments as $c): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($c['name']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($c['title']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($c['comment']) ?>
                </td>
                <td>
                    <?= $c['date_time_added'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
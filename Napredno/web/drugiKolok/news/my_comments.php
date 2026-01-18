<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user'])) {
    $_SESSION['error'] = "Morate biti prijavljeni!";
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT c.*, p.title 
                       FROM comments c 
                       JOIN posts p ON c.id_post = p.id_post 
                       WHERE c.id_user=? 
                       ORDER BY c.date_time_added DESC");
$stmt->execute([$_SESSION['id_user']]);
$comments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>

<body>
    <h2>My Comments</h2>
    <table border="1">
        <tr>
            <th>Post</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Work Status</th>
            <th>Date</th>
        </tr>
        <?php foreach ($comments as $c): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($c['title']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($c['comment']) ?>
                </td>
                <td>
                    <?= $c['status'] ?>
                </td>
                <td>
                    <?= $c['work_status'] ?>
                </td>
                <td>
                    <?= $c['date_time_added'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
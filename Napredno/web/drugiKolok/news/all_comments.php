<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

if(!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin'){
    $_SESSION['error'] = "Morate biti admin!";
    header("Location: index.php");
    exit;
}

$stmt = $pdo->query("SELECT c.*, u.name, p.title FROM comments c
                     JOIN users u ON c.id_user = u.id_user
                     JOIN posts p ON c.id_post = p.id_post
                     ORDER BY c.date_time_added DESC");
$comments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<body>
<h2>All Comments</h2>
<table border="1">
<tr>
    <th>User</th>
    <th>Post</th>
    <th>Comment</th>
    <th>Status</th>
    <th>Work Status</th>
    <th>Date</th>
    <th>Actions</th>
</tr>
<?php foreach($comments as $c): ?>
<tr>
    <td><?= htmlspecialchars($c['name']) ?></td>
    <td><?= htmlspecialchars($c['title']) ?></td>
    <td><?= htmlspecialchars($c['comment']) ?></td>
    <td><?= $c['status'] ?></td>
    <td><?= $c['work_status'] ?></td>
    <td><?= $c['date_time_added'] ?></td>
    <td>
        <a href="change_comment_status.php?id=<?= $c['id_comment'] ?>&status=private">Change to Private</a> |
        <a href="change_comment_status.php?id=<?= $c['id_comment'] ?>&status=public">Change to Public</a> |
        <a href="change_comment_work_status.php?id=<?= $c['id_comment'] ?>&work=accepted">Accept</a> |
        <a href="change_comment_work_status.php?id=<?= $c['id_comment'] ?>&work=rejected">Reject</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>

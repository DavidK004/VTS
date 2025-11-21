<?php
session_start();
if (!isset($_SESSION['id_worker']) || !$_SESSION['is_admin']) {
    header('Location: index.php');
    exit;
}

require 'db-config.php';

$stmt = $pdo->query('
SELECT c.comment, c.date_added, w.username
FROM comment c
JOIN worker w ON c.id_worker = w.id_worker
ORDER BY c.date_added DESC
');
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>All Comments</title>
</head>
<body>
<h2>All Comments</h2>
<table border="1">
<tr><th>Username</th><th>Comment</th><th>Date Added</th></tr>
<?php foreach ($comments as $c): ?>
<tr>
<td><?=htmlspecialchars($c['username'])?></td>
<td><?=nl2br(htmlspecialchars($c['comment']))?></td>
<td><?=htmlspecialchars($c['date_added'])?></td>
</tr>
<?php endforeach; ?>
</table>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

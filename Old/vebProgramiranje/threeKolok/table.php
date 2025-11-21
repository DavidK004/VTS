<?php
require 'db-config.php';
$stmt = $pdo->query("SELECT b.name, d.description, d.date_added FROM breed b JOIN descriptions d ON b.id_breed = d.id_breed");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1" cellpadding="5">
<tr><th>Breed</th><th>Description</th><th>Date Added</th></tr>
<?php foreach($data as $row): ?>
<tr>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['description']) ?></td>
<td><?= htmlspecialchars($row['date_added']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<a href="votes.php">Vote for your favorite breed</a>

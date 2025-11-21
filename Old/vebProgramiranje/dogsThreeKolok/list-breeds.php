<?php
require_once 'db-config.php';

$stmt = $pdo->query("SELECT * FROM breed");
while ($row = $stmt->fetch()) {
    echo $row['breed_id'] . " " . $row['name'] . "<br>";
}

$stmt = $pdo->query("SELECT * FROM descriptions");
while ($row = $stmt->fetch()) {
    echo $row['breed_id'] . " " . $row['description'] . "<br>";
}

$stmt = $pdo->query("SELECT * FROM votes");
while ($row = $stmt->fetch()) {
    echo $row['breed_id'] . " " . $row['votes'] . "<br>";
}
?>
<a href="voting.php">go to vote for best boy</a>
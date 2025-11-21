<?php
require_once "db-config.php";

// Check if POST data is set
if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    // Check if the breed exists
    $stmt = $pdo->prepare("SELECT * FROM votes WHERE breed_id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        // Update vote count
        $update = $pdo->prepare("UPDATE votes SET votes = votes + 1 WHERE breed_id = ?");
        $update->execute([$id]);
    } else {
        // First vote for this breed — insert new row
        $insert = $pdo->prepare("INSERT INTO votes (breed_id, votes) VALUES (?, 1)");
        $insert->execute([$id]);
    }

    // Return updated vote count
    $result = $pdo->prepare("SELECT votes FROM votes WHERE breed_id = ?");
    $result->execute([$id]);
    $row = $result->fetch();

    echo "Votes: " . $row['votes'];
} else {
    echo "No breed selected.";
}
<?php
session_start();
require 'functions.php';
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user'], $_SESSION['role']) || $_SESSION['role'] != 'user') {
    $_SESSION['error'] = "Morate biti prijavljeni kao korisnik!";
    header("Location: index.php");
    exit;
}

// Dohvatanje postova za select listu
$stmt = $pdo->query("SELECT id_post, title FROM posts");
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>

<body>
    <?php if (isset($_SESSION['error'])) {
        echo "<p>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    } ?>

    <form method="post" action="add_new_comment.php">
        <label for="post">Select Post:</label>
        <select name="post" id="post" required>
            <option value="">--Select--</option>
            <?php foreach ($posts as $post): ?>
                <option value="<?= $post['id_post'] ?>">
                    <?= htmlspecialchars($post['title']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Status:</label>
        <input type="radio" name="status" value="private" required> Private
        <input type="radio" name="status" value="public"> Public<br><br>

        <label>Comment:</label><br>
        <textarea name="comment" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>
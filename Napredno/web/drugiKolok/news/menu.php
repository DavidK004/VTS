<?php
session_start();
if (!isset($_SESSION['id_user'], $_SESSION['role'])) {
    $_SESSION['error'] = "Morate biti prijavljeni!";
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<body>
    <h1>Welcome</h1>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a href="all_comments.php">All comments</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="new_comment.php">Add new comment</a>
        <a href="my_comments.php">My comments</a>
        <a href="all_public_comments.php">Public comments</a>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</body>

</html>
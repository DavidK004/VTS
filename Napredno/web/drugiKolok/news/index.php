<?php session_start(); ?>
<!DOCTYPE html>
<html>

<body>
    <?php if (isset($_SESSION['error'])) {
        echo "<p>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    } ?>
    <form method="post" action="check.php">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Login</button>
        <button type="reset">Cancel</button>
    </form>
</body>

</html>
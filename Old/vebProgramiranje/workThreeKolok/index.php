<?php session_start();
if (isset($_SESSION['id_worker'])) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login</title>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        if (!username || !password) {
            alert('Both username and password are required!');
            e.preventDefault();
        }
    });
});
</script>
</head>
<body>
<h2>Login</h2>
<form id="loginForm" action="check.php" method="POST">
<label>Username:<br>
<input type="text" id="username" name="username" />
</label><br><br>
<label>Password:<br>
<input type="password" id="password" name="password" />
</label><br><br>
<button type="submit">Login</button>
</form>
</body>
</html>

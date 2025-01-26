<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert</title>
</head>
<body>
<form method="post" action="7-form.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"> <br><br>
    <label for="job">Job:</label>
    <input type="text" name="job" id="job"> <br><br>
    <label for="salary">Salary:</label>
    <input type="text" name="salary" id="salary"> <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"> <br><br>
    <label for="internet">Internet:</label>
    <select name="internet" id="internet">
        <option value="choose" disabled selected>choose</option>
        <option value="adsl">adsl</option>
        <option value="dialup">dialup</option>
        <option value="cabel">cabel</option>
    </select><br><br>
    <input type="submit" name="sb" value="send">
    <input type="reset" name="rb" value="cancel">
</form>

<?php

$error = $_GET['error'] ?? 0;

if ($error == 1) {
    echo "ERROR! Please fill all fields!";
}

?>
</body>
</html>
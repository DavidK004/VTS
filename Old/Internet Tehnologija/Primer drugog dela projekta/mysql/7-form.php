<?php
// https://www.php.net/manual/en/mysqli.real-escape-string.php

require 'db_config.php';
$internets = ['adsl', 'dialup', 'cable'];

$name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : null;
$job = isset($_POST['job']) ? mysqli_real_escape_string($connection, $_POST['job']) : null;
$salary = isset($_POST['salary']) ? (int)mysqli_real_escape_string($connection, $_POST['salary']) : null;
$password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : null;
$internet = isset($_POST['internet']) ? mysqli_real_escape_string($connection, $_POST['internet']) : null;

if (empty($name) or empty($job) or empty($salary) or empty($password) or !in_array($internet, $internets)) {
    header("Location: 7.php?error=1");
    exit();
} else {
    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO workers(name, job, salary, password, date, internet)
            VALUES ('$name','$job', $salary, '$password', now(), '$internet')";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    echo "Inserted row number: " . mysqli_affected_rows($connection);
    echo "<hr>";
    echo "Last inserted id " . mysqli_insert_id($connection);
    echo '<br>Data inserted successfully! <a href="7.php">Insert new data</a>';
    mysqli_close($connection);
}
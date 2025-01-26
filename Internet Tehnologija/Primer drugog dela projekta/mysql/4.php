<?php
require 'db_config.php';

$sql = "UPDATE workers SET name='VTS tester3'
        WHERE name='VTS'";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

echo mysqli_affected_rows($connection);

mysqli_close($connection);
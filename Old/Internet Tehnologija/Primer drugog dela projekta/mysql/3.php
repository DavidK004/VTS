<?php
require 'db_config.php';

$sql = "INSERT INTO workers(name,job,salary,password, date,internet)
        VALUES ('VTS','VTS',123,'',now(),'adsl')";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

echo mysqli_affected_rows($connection);

echo "<hr>";

echo mysqli_insert_id($connection);

mysqli_close($connection);




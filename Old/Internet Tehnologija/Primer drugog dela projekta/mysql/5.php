<?php
require 'db_config.php';

$sql = "DELETE FROM workers WHERE job='VTS'";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

echo mysqli_affected_rows($connection);

mysqli_close($connection);
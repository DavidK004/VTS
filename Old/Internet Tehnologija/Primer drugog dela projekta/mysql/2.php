<?php
require 'db_config.php';

$sql = "SELECT * FROM workers";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_row($result)) {
        //var_dump($row);
        echo $row[0] . " " . $row[1] . "<br>";
    }
    mysqli_free_result($result);
}

mysqli_close($connection);
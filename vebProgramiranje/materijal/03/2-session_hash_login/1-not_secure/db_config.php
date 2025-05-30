<?php
define("DB", [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASSWORD' => 'axis',
    'NAME' => 'wp'
]);


$connection = mysqli_connect(DB['HOST'], DB['USER'], DB['PASSWORD'], DB['NAME']) or die(mysqli_connect_error());

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connection, "utf8mb4");
<?php

//define("HOST", "localhost");
//define("USER", "root");
//define("PASSWORD", ""); // "" default for localhost
//define("DATABASE", "it");


//define("DBPARAMS", [
//    "HOST" => 'localhost',
//    "USER" => 'root',
//    "PASSWORD" => '',
//    "DATABASE" => 'it'
//]);


const DBPARAMS = [
    "HOST" => 'localhost',
    "USER" => 'root',
    "PASSWORD" => '',
    "DATABASE" => 'it'
];

//$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_connect_error());
$connection = mysqli_connect(DBPARAMS['HOST'], DBPARAMS['USER'], DBPARAMS['PASSWORD'], DBPARAMS['DATABASE']) or die(mysqli_connect_error());

mysqli_query($connection, "SET NAMES utf8mb4") or die (mysqli_error($connection));
mysqli_query($connection, "SET CHARACTER SET utf8mb4") or die (mysqli_error($connection));
mysqli_query($connection, "SET COLLATION_CONNECTION='utf8mb4_general_ci'") or die (mysqli_error($connection));

// http://php.net/manual/en/book.mysqli.php


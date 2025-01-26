<?php
if (defined('SECRET') and SECRET == '@3eweHjdsdfuihjhjhj#VGVgggg!') {
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", ""); // "" default for localhost
    define("DATABASE", "it");

    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);


    mysqli_query($connection, "SET NAMES utf8") or die (mysqli_error($connection));
    mysqli_query($connection, "SET CHARACTER SET utf8") or die (mysqli_error($connection));
    mysqli_query($connection, "SET COLLATION_CONNECTION='utf8_general_ci'") or die (mysqli_error($connection));

    $GLOBALS['connection'] = $connection;

    // http://php.net/manual/en/book.mysqli.php
}
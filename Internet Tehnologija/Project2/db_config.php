<?php 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', 'axis');
    define('DATABASE', 'manga');

    $connect = new mysqli(HOST,USER,PASS,DATABASE);
    if($connect -> connect_error) {
        echo $connect -> connect_error;
    }
?>
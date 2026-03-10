<?php
date_default_timezone_set('Europe/Belgrade');

const PARAMS = [
    "HOST" => 'localhost',
    "USER" => 'root',
    "PASSWORD" => 'axis',
    "DB" => 'gallery',
    "CHARSET" => 'utf8mb4'
];

$dsn = "mysql:host=" . PARAMS['HOST'] . ";dbname=" . PARAMS['DB'] . ";charset=" . PARAMS['CHARSET'];

$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$names = ['ChrIS2', 'JohHn2', '3toM', 'rAY', 'AxEl', '1bOraT'];

$level = ['admin', 'reporter', 'guest'];
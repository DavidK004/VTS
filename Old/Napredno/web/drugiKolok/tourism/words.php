<?php
require 'config.php';
require 'functions.php';

$pdo = connectToDatabase(DB_CONFIG);

$wordArrays = getWordArrays($words);

insertCategories($pdo, $wordArrays['categories']);
insertCities($pdo, $wordArrays['cities']);
?>

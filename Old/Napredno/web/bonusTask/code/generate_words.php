<?php
require_once 'functions.php';

$path = __DIR__ . '/google-10000-english.txt';
$wordList = file($path, FILE_IGNORE_NEW_LINES |
FILE_SKIP_EMPTY_LINES);

shuffle($wordList);

$pdo = $GLOBALS['pdo'];
$pdo->beginTransaction();

foreach ($wordList as $word) {
    insertIntoWords($word);
}

$pdo->commit();
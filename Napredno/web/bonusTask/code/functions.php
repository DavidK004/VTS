<?php
require_once 'config.php';

$GLOBALS['pdo'] = connectDatabase($dsn, $pdoOptions);

function connectDatabase(string $dsn, array $pdoOptions): PDO
{
    try {
        $pdo = new PDO($dsn, PARAMS['USER'], PARAMS['PASSWORD'], $pdoOptions);
    } catch (\PDOException $e) {
        var_dump($e->getCode());
        throw new \PDOException($e->getMessage());
    }

    return $pdo;
}


function insertIntoWords(string $word): void
{
    $pdo = $GLOBALS['pdo'];

    $sql = 'INSERT INTO words (word) VALUES (:word)';
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':word' => $word]);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
        } else {
            throw $e;
        }
    }
}

function getWordLengths(): array
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->query("SELECT DISTINCT word_length FROM words ORDER BY word_length ASC");
    $lengths = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return array_map('intval', $lengths);
}

function getWordsInRange(int $minLength = 3, int $maxLength = 15): array
{
    $pdo = $GLOBALS['pdo'];
    $sql = "SELECT id_word, word FROM words WHERE word_length BETWEEN :min AND :max";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':min' => $minLength, ':max' => $maxLength]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findClosestWord(string $inputWord, array $words): ?array
{
    $closestWord = null;
    $smallestDistance = null;

    foreach ($words as $row) {
        $distance = levenshtein($inputWord, $row['word']);

        if ($smallestDistance === null || $distance < $smallestDistance) {
            $smallestDistance = $distance;
            $closestWord = $row;
        }
    }

    if ($closestWord === null)
        return null;

    $closestWord['distance'] = $smallestDistance;
    return $closestWord;
}

function insertResult(int $idWord, string $inputWord, int $distance): void
{
    $pdo = $GLOBALS['pdo'];

    $sql = "INSERT INTO results (id_word, input, distance, date_time) 
            VALUES (:id_word, :input, :distance, NOW())";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':id_word' => $idWord,
            ':input' => $inputWord,
            ':distance' => $distance
        ]);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
        } else {
            throw $e;
        }
    }
}
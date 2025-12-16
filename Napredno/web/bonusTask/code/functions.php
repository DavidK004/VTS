<?php
require_once 'config.php';

$GLOBALS['pdo'] = connectDatabase($dsn, $pdoOptions);

/**
 * Establishes PDO database connection.
 *
 * @param string $dsn
 * @param array  $pdoOptions
 * @return PDO
 * @throws PDOException
 */
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
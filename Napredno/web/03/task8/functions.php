<?php
declare(strict_types=1);
$pdo = connectDatabase($dsn, $pdoOptions);
/**
 * connects to database
 * @param string $dsn
 * @param array $pdoOptions
 * @throws \PDOException
 * @return PDO
 */
function connectDatabase(string $dsn, array $pdoOptions): PDO
{
    try {
        return new PDO($dsn, PARAMS['USER'], PARAMS['PASSWORD'], $pdoOptions);
    } catch (\PDOException $e) {
        var_dump($e->getCode());
        throw new \PDOException($e->getMessage());
    }
}
/**
 * Inserts data into table
 * @param string $original_text
 * @param string $modified_text
 * @param string $length
 * @return void
 */
function insertData(string $original_text, string $modified_text, string $length): void
{
    global $pdo;

    $sql = "INSERT INTO text_transform (original_text, modified_text, length)
            VALUES (:ot, :mt, :length)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':ot', $original_text, PDO::PARAM_STR);
    $stmt->bindValue(':mt', $modified_text, PDO::PARAM_STR);
    $stmt->bindValue(':length', $length, PDO::PARAM_STR);
    $stmt->execute();
}
/**
 * Returns data from table
 * @return array
 */
function getData(): array
{
    global $pdo;

    $sql = "SELECT original_text, modified_text, length FROM text_transform ORDER BY created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * Returns original text, length of text and processed text according to task requirements
 * @param string $text
 * @return array{length: int, modified: string, original: string}
 */
function processText(string $text): array
{
    $original = $text;

    $modified = trim($text);

    $words = explode(' ', $modified);
    $words = array_filter($words, fn($w) => $w !== '');
    $modified = implode(' ', $words);

    $modified = str_replace(['a', 'A'], '@', $modified);

    $modified = ucwords($modified);

    if (mb_strlen($modified) > 100) {
        $modified = mb_substr($modified, 0, 100) . '...';
    }

     $length = mb_strlen($modified);

     return [
        'original' => $original,
        'modified' => $modified,
        'length' => $length
    ];
}

<?php
require_once(dirname(__FILE__) . "/config.php");
$pdo = connectDatabase($dsn, $pdoOptions);

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

function insertRandomData(string $name, int $number): bool {
    global $pdo;
    $sql = "INSERT INTO random_data (random_name, random_number) VALUES (:name, :number)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':name' => $name,
        ':number' => $number
    ]);
}

function getLastRandomValues(int $limit = 10): array {
    global $pdo;
    $sql = "SELECT * FROM random_data ORDER BY id DESC LIMIT :limit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
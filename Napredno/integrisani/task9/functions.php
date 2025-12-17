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

function insertToken(string $token, int $restrictionNumber, string $dateExpire): bool
{
    $pdo = $GLOBALS['pdo'];
    $stmt = $pdo->prepare("
        INSERT INTO tokens (token, restriction_number, date_expire)
        VALUES (:token, :restriction, :expire)
    ");
    return $stmt->execute([
        'token' => $token,
        'restriction' => $restrictionNumber,
        'expire' => $dateExpire
    ]);
}

function validateToken(string $token): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT id_token, restriction_number, date_expire
        FROM tokens
        WHERE token = :token
    ");
    $stmt->execute(['token' => $token]);
    $tokenData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tokenData)
        return null;
    if (strtotime($tokenData['date_expire']) < time())
        return null;

    return $tokenData;
}

function checkTokenLimit(int $idToken, int $limit): bool
{
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT COUNT(*) FROM token_usages
        WHERE id_token = :id_token AND DATE(date_time) = CURDATE()
    ");
    $stmt->execute(['id_token' => $idToken]);
    $count = (int) $stmt->fetchColumn();

    return $count < $limit;
}

function logTokenUsage(int $idToken, string $url): void
{
    global $pdo;
    $stmt = $pdo->prepare("
        INSERT INTO token_usages (id_token, request_url, date_time)
        VALUES (:id_token, :url, NOW())
    ");
    $stmt->execute(['id_token' => $idToken, 'url' => $url]);
}

function getAllProducts(): array
{
    global $pdo;
    $stmt = $pdo->query("
        SELECT p.id_product, c.name AS category, p.name, p.price, p.amount, p.date_added
        FROM products p
        LEFT JOIN categories c ON p.id_category = c.id_category
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductById(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT p.id_product, c.name AS category, p.name, p.price, p.amount, p.date_added
        FROM products p
        LEFT JOIN categories c ON p.id_category = c.id_category
        WHERE p.id_product = :id
    ");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

function getAllCategories(): array
{
    global $pdo;
    $stmt = $pdo->query("
        SELECT id_category, name, date_added
        FROM categories
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByCategoryId(int $id): array
{
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT p.id_product, p.name, p.price, p.amount, p.date_added
        FROM products p
        WHERE p.id_category = :id
    ");
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createProduct(array $data): int
{
    global $pdo;
    $stmt = $pdo->prepare("
        INSERT INTO products (id_category, name, price, amount, date_added)
        VALUES (:id_category, :name, :price, :amount, NOW())
    ");
    $stmt->execute([
        'id_category' => $data['id_category'] ?? null,
        'name' => $data['name'],
        'price' => $data['price'],
        'amount' => $data['amount']
    ]);
    return (int) $pdo->lastInsertId();
}

function deleteProduct(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM products WHERE id_product = :id");
    return $stmt->execute(['id' => $id]);
}

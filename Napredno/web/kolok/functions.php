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

function getCategories(string $cat): array
{
    $words = explode(' ', $cat);

    $cat_temp = array_map(function ($word) {
        $cleaned = '';

        for ($i = 0; $i < strlen($word); $i++) {
            if (ctype_alnum($word[$i])) {
                $cleaned .= $word[$i];
            }
        }
        return $cleaned;
    }, $words);


    $cat_temp = array_filter($cat_temp, function ($word) {
        return strlen($word) > 4;
    });


    return array_values($cat_temp);
}

function createUsers(array $names, array $level): array
{

}
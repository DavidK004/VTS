<?php
declare(strict_types=1);
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

function createUsers(array $names, array $levels): array
{
    $cleanNames = array_map(function (string $name): string {
        $result = '';

        for ($i = 0; $i < strlen($name); $i++) {
            if (ctype_alpha($name[$i])) {
                $result .= $name[$i];
            }
        }

        return ucfirst(strtolower($result));
    }, $names);

    $users = [];
    $usedUsernames = [];
    $usedLevels = [];

    for ($i = 0; $i < 3; $i++) {


        $name = $cleanNames[array_rand($cleanNames)];

        $username = 'user' . strtolower($name);

        if (in_array($username, $usedUsernames)) {
            $username .= rand(10, 200);
        }
        $usedUsernames[] = $username;


        $password = time() . $username;
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


        $email = $username . '@photo.com';


        $age = rand(18, 47);


        do {
            $level = $levels[array_rand($levels)];
        } while (in_array($level, $usedLevels));
        $usedLevels[] = $level;

        $users[] = [
            'username' => $username,
            'password' => $password,
            'hashed_password' => $hashedPassword,
            'age' => $age,
            'name' => $name,
            'email' => $email,
            'level' => $level
        ];
    }

    return $users;
}
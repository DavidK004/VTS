<?php

function connectToDatabase($config) {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
    $pdo = new PDO($dsn, $config['user'], $config['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

function getWordArrays($words) {
    $categories = [];
    $cities = [];

    foreach ($words as $word) {
        $lastChar = substr($word, -1);
        $firstChar = substr($word, 0, 1);

        if (is_numeric($lastChar)) {
            $name = strtolower(substr($word, 0, -1));
            $categories[] = $name;
        }

        if (is_numeric($firstChar)) {
            $name = ucfirst(strtolower(substr($word, 1)));
            $cities[] = $name;
        }
    }

    return ['categories' => $categories, 'cities' => $cities];
}

function insertCategories($pdo, $categories) {
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
    foreach ($categories as $category) {
        $stmt->execute([$category]);
    }
    echo "Categories-OK<br>";
}

function insertCities($pdo, $cities) {
    $stmt = $pdo->prepare("INSERT INTO cities (name) VALUES (?)");
    foreach ($cities as $city) {
        $stmt->execute([$city]);
    }
    echo "Cities-OK<br>";
}

function createUsers($names, $roles) {
    $users = [];

    $names = array_map(function($n) { return ucfirst(strtolower($n)); }, $names);

    for ($i = 0; $i < 5; $i++) {
        $name = $names[array_rand($names)];
        $username = 'user' . strtolower($name);
        $randomNum = rand(1000, 5000);
        $clear_password = $username . $randomNum;
        $password = password_hash($clear_password, PASSWORD_BCRYPT);
        $email = $username . '@company.com';
        $role = $roles[array_rand($roles)];

        $users[] = [
            'username' => $username,
            'password' => $password,
            'clear_password' => $clear_password,
            'name' => $name,
            'email' => $email,
            'role' => $role
        ];
    }

    return $users;
}

?>

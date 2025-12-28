<?php
require_once 'config.php';
require_once 'functions.php';

$users = createUsers($names, $level);

var_dump($users);

foreach ($users as $user) {
    $stmt = $pdo->prepare("
        INSERT INTO users (username, password, age, email, level, date_time_added)
        VALUES (:username, :password, :age, :email, :level, NOW())
    ");
    $stmt->execute([
        ':username' => $user['username'],
        ':password' => $user['hashed_password'],
        ':age' => $user['age'],
        ':email' => $user['email'],
        ':level' => $user['level']
    ]);
}
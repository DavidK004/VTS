<?php
require 'config.php';
require 'functions.php';

$pdo = connectToDatabase(DB_CONFIG);

$users = createUsers($names, $roles);

$stmt = $pdo->prepare("INSERT INTO users (username,password,clear_password,name,email,role) VALUES (?,?,?,?,?,?)");
foreach ($users as $user) {
    $stmt->execute([
        $user['username'],
        $user['password'],
        $user['clear_password'],
        $user['name'],
        $user['email'],
        $user['role']
    ]);
}

echo "Users inserted successfully!";
?>

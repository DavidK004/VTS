<?php
require_once 'db_config.php';
require_once 'creator.php';

$pdo = connectDb();

$sql = "INSERT INTO developers 
(username, password, clear_password, name, position, salary, email, role)
VALUES (:username, :password, :clear_password, :name, :position, :salary, :email, :role)";
$stmt = $pdo->prepare($sql);

foreach ($developers as $dev) {
    $stmt->execute([
        ':username' => $dev['username'],
        ':password' => $dev['password'],
        ':clear_password' => $dev['clear_password'],
        ':name' => $dev['name'],
        ':position' => $dev['position'],
        ':salary' => $dev['salary'],
        ':email' => $dev['email'],
        ':role' => $dev['role']
    ]);
}

echo "Developers inserted successfully!";
?>

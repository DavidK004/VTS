<?php
require 'vendor/autoload.php';
require 'functions.php';

$faker = Faker\Factory::create();
$pdo = connectToDatabase(DB_PARAMS);
global $roles;

for ($i = 0; $i < 10; $i++) {
    $clearPass = $faker->password;
    $hashedPass = password_hash($clearPass, PASSWORD_BCRYPT);
    $role = $roles[array_rand($roles)];

    $stmt = $pdo->prepare("INSERT INTO users (email, password, clear_password, name, address, city, role) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([
        $faker->unique()->email,
        $hashedPass,
        $clearPass,
        $faker->name,
        $faker->address,
        $faker->city,
        $role
    ]);
}

for ($i = 0; $i < 10; $i++) {
    $stmt = $pdo->prepare("INSERT INTO posts (title, text) VALUES (?,?)");
    $stmt->execute([$faker->sentence, $faker->paragraph]);
}

echo "10 users and 10 posts generated.";

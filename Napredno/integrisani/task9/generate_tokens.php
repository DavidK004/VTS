<?php
require_once 'functions.php';
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

for ($i = 0; $i < 50; $i++) {
    $token = $faker->sha256;
    $restrictionNumber = rand(50, 200);
    $dateExpire = date('Y-m-d H:i:s', time() + rand(0, 86400));

    insertToken($token, $restrictionNumber, $dateExpire);
}

echo "50 tokens generated successfully.\n";
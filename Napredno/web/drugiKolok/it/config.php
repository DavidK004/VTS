<?php
// DB access parameters
define('DB_CONFIG', [
    'host' => 'localhost',
    'dbname' => 'it',
    'user' => 'root',       // change if needed
    'pass' => '',           // change if needed
]);

// Developer names
$names = [
    ['firstname' => 'John', 'lastname' => 'Doe'],
    ['firstname' => 'Jane', 'lastname' => 'Smith'],
    ['firstname' => 'Alice', 'lastname' => 'Brown'],
    ['firstname' => 'Bob', 'lastname' => 'Johnson'],
    ['firstname' => 'Charlie', 'lastname' => 'Lee'],
    ['firstname' => 'David', 'lastname' => 'Katrinka'],
    ['firstname' => 'Eve', 'lastname' => 'Williams'],
    ['firstname' => 'Frank', 'lastname' => 'Taylor'],
    ['firstname' => 'Grace', 'lastname' => 'Moore'],
    ['firstname' => 'Hank', 'lastname' => 'Miller']
];

// Positions and salaries
$positions = [
    ['name' => 'junior', 'salary' => 500],
    ['name' => 'medior', 'salary' => 1000],
    ['name' => 'senior', 'salary' => 2000]
];

// Roles
$roles = ['admin', 'frontend developer', 'backend developer', 'full stack developer', 'boss'];
?>
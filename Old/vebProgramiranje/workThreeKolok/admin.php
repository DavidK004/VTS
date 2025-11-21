<?php
require_once "db-config.php";

$position_id = 1; // Assuming 1 = Administrator
$name = "Admin User";
$email = "admin@example.com";
$username = "admin";
$password = "admin123";
$salary = 99999.99;
$is_admin = 1;

// Hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare the insert
$sql = "INSERT INTO worker (id_position, name, email, username, password, salary, is_admin)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$success = $stmt->execute([
    $position_id,
    $name,
    $email,
    $username,
    $hashedPassword,
    $salary,
    $is_admin
]);

if ($success) {
    echo "Admin user added successfully.";
} else {
    echo "Failed to add admin.";
}

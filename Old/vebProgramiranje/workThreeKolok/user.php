<?php
require_once "db-config.php";

$position_id = 2; // Example: 2 = Developer (normal user)
$name = "John Doe";
$email = "john@example.com";
$username = "john_doe";
$password = "userpassword";
$salary = 35000.00;
$is_admin = 0; // Normal user

// Hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare the insert query
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
    echo "User added successfully.";
} else {
    echo "Failed to add user.";
}

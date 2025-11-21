<?php
// --- PDO Connection Setup ---
$host = 'localhost';
$db = 'database_name';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// --- Password Hashing Example ---

// 1. Hash password before storing in DB (e.g., during registration)
$plainPassword = "userpassword123";
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

// Insert user with hashed password
$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':username' => 'David',
    ':password' => $hashedPassword
]);

// 2. Verify password during login
$inputPassword = "userpassword123";  // Password entered by user
$sql = "SELECT password FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => 'David']);
$user = $stmt->fetch();

if ($user && password_verify($inputPassword, $user['password'])) {
    // Password is correct — login success
} else {
    // Invalid password
}

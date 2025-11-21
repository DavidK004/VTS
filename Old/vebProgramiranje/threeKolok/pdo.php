<?php
// --- PDO Connection Setup ---
$host = 'localhost';
$db = 'database_name';     // Change to your DB name
$user = 'root';            // Change to your DB user
$pass = '';                // Change to your DB password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Throw exceptions on errors
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // Fetch results as associative arrays
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// --- Basic Query (no parameters) ---
$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row['username'] . "<br>";
}

// --- Prepared Statement with Positional Placeholders ---
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([5]);    // Bind parameter id=5
$user = $stmt->fetch();

// --- Prepared Statement with Named Placeholders ---
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => 'example@example.com']);
$user = $stmt->fetch();

// --- Insert Data ---
$sql = "INSERT INTO users (username, email) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['David', 'david@example.com']);

// --- Insert Data with Named Placeholders ---
$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':username' => 'David',
    ':email' => 'david@example.com'
]);

// --- Update Data ---
$sql = "UPDATE users SET email = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['newemail@example.com', 5]);

// --- Delete Data ---
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([5]);

// --- Fetch All Rows ---
$stmt = $pdo->query("SELECT * FROM users");
$rows = $stmt->fetchAll();
foreach ($rows as $row) {
    echo $row['username'] . "<br>";
}

// --- Fetch One Row ---
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([1]);
$user = $stmt->fetch();   // Single row or false

// --- Get Last Insert ID ---
$lastId = $pdo->lastInsertId();
echo "Last inserted ID: " . $lastId . "<br>";

// --- Transactions ---
try {
    $pdo->beginTransaction();

    $pdo->exec("UPDATE accounts SET balance = balance - 100 WHERE user_id = 1");
    $pdo->exec("UPDATE accounts SET balance = balance + 100 WHERE user_id = 2");

    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
?>

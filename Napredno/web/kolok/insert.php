<?php
require_once 'category.php';

try {
    $pdo = $GLOBALS['pdo'];

    $sql = "INSERT INTO categories (name, code, date_time_added) VALUES (:name, :code, :date_time_added)";
    $stmt = $pdo->prepare($sql);

    foreach ($categories as $code => $name) {
        $stmt->execute([
            ':name' => $name,
            ':code' => $code,
            ':date_time_added' => date('Y-m-d H:i:s')
        ]);
    }

    echo "Podaci su uspešno ubaceni u tabelu categories.";

} catch (PDOException $e) {
    echo "Greška pri ubacivanju: " . $e->getMessage();
}
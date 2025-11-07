<?php

require_once 'config.php';
require_once 'db_config.php';

try {
    $sql = "DELETE FROM users_web WHERE email = :email";
    $query = $connection->prepare($sql);

    // Assign value before binding (better readability)
    $email = "t3@tt.com";
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    // Execute the delete query
    $query->execute();

    // Check how many rows were deleted
    if ($query->rowCount() > 0) {
        echo $query->rowCount() . " rows were affected.";
    } else {
        echo "No affected rows.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
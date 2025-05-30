<?php

require_once 'config.php';
require_once 'db_config.php';

try {
    $sql = "UPDATE users_web
            SET active = :active, password = :password
            WHERE email LIKE CONCAT('%', :email, '%')";

    $query = $connection->prepare($sql);

    // Values to be updated
    $email = "t@t.com";
    $password = password_hash("secret", PASSWORD_DEFAULT);
    $active = 0;

    // Bind parameters
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':active', $active, PDO::PARAM_INT);

    // Execute update
    $query->execute();

    // Check affected rows
    if ($query->rowCount() > 0) {
        echo $query->rowCount() . " rows were affected.";
    } else {
        echo "No affected rows.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

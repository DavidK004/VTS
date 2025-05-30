<?php

require_once 'config.php';
require_once 'db_config.php';

// SQL INSERT with named placeholders
$sql = "INSERT INTO users_web
        (firstname, lastname, email, registration_expires, active)
        VALUES
        (:firstname, :lastname, :email, :registration_expires, :active)";

try {
    // Sample values
    $firstname = "t1";
    $lastname = "t2";
    $email = "t@t.com";
    $registrationExpires = date('Y-m-d H:i:s');
    $active = 1;

    // Prepare the query
    $query = $connection->prepare($sql);

    // Bind values using bindParam (by reference)
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':registration_expires', $registrationExpires, PDO::PARAM_STR);
    $query->bindParam(':active', $active, PDO::PARAM_INT);

    // Execute the query
    $query->execute();

    // Get the last inserted ID
    $lastInsertId = $connection->lastInsertId();

    echo "New user inserted. ID: " . $lastInsertId;

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

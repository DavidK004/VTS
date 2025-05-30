<?php

require_once 'config.php';
require_once 'db_config.php';


$sql = "INSERT INTO users_web
        (firstname, lastname, email, registration_expires, active)
        VALUES
        (:firstname, :lastname, :email, :registration_expires, :active)";

try {
    // Prepare the statement once
    $query = $connection->prepare($sql);

    // Bind parameters by reference (will be reassigned in loop)
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':registration_expires', $registrationExpires, PDO::PARAM_STR);
    $query->bindParam(':active', $active, PDO::PARAM_INT);

    // Example user data
    $users = [
        ['firstname' => 'test1fn', 'lastname' => 'test1ln', 'email' => 't1@tt.com', 'registration_expires' => '2024-01-01 10:00:00', 'active' => 1],
        ['firstname' => 'test2fn', 'lastname' => 'test2ln', 'email' => 't2@tt.com', 'registration_expires' => '2024-01-02 11:00:00', 'active' => 1],
        ['firstname' => 'test3fn', 'lastname' => 'test3ln', 'email' => 't3@tt.com', 'registration_expires' => '2024-01-03 12:00:00', 'active' => 1]
    ];

    foreach ($users as $value) {
        $firstname = $value['firstname'];
        $lastname = $value['lastname'];
        $email = $value['email'];
        $registrationExpires = $value['registration_expires'];
        $active = $value['active'];

        $query->execute();

        $lastInsertId = $connection->lastInsertId();

        if ($lastInsertId > 0) {
            echo "Inserted user ID: $lastInsertId<br>";
        } else {
            echo "Insert failed.<br>";
        }
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

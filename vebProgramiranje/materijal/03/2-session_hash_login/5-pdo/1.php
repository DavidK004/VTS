<?php

/*
PDO (PHP Data Objects) is a PHP extension through which we can access and work with databases.
Though PDO is similar in many aspects to mySQLi, it is better to work with for the following
reasons:
• It is better protected against hackers.
• It is consistent across databases, so it can work with MySQL as well as other types of databases
  (SQLite, Oracle, PostgreSQL, etc.)
• It is object oriented at its core.

• PDO::PARAM_STR is used for strings.
• PDO::PARAM_INT is used for integers.
• PDO::PARAM_BOOL allows only boolean (true/false) values.
• PDO::PARAM_NULL allows only NULL datatype.

*/
require_once 'config.php';
require_once 'db_config.php';

// Sample values
$firstname = "test";
$email = "test@gmail.com";

// SQL with named placeholders
$sql = "SELECT * FROM users_web WHERE firstname = :firstname AND email = :email";
$query = $connection->prepare($sql);

/*
bindParam() binds a variable by reference.
This means the value is evaluated at the time of execute(), not at the time of binding.
It is useful when the value may change before execute() is called.
*/
$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);

/*
bindValue() binds a fixed value at the time of binding.
It is evaluated immediately and does not rely on the variable's future value.
Use it when the value is constant or already known.
*/
$query->bindValue(':email', $email, PDO::PARAM_STR);

// Execute the query
$query->execute();

// Fetch results as objects
$results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC

// Debug: dump the result set
var_dump($results);

// Display results if found
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        echo $result->firstname . ", ";
        echo $result->lastname . ", ";
        echo $result->email . "<br>";
    }
} else {
    echo "No results found.";
}
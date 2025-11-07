<?php
$names = ['eagle', 'hawk', 'dog', 'cat', 'lizard', 'snake'];

foreach ($names as $name) {
    $hashed_password = password_hash("$name", PASSWORD_BCRYPT);
    // $hashed_password = password_hash("$name", PASSWORD_DEFAULT); // alternative
    echo "For <b>$name</b> password is <b>$name</b> and the hashed password is $hashed_password<br>";
}
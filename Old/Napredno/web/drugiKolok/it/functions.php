<?php
function createDevelopersArray($names, $positions, $roles) {
    $developers = [];
    $currentYear = date("Y");

    for ($i = 0; $i < count($names); $i++) {
        $firstname = $names[$i]['firstname'];
        $lastname = $names[$i]['lastname'];
        $positionIndex = rand(0, count($positions) - 1);
        $roleIndex = ($i === 0) ? 0 : rand(1, count($roles) - 1); // First developer is admin

        $username = strtolower($firstname . $lastname);
        $passwordPlain = $firstname . '-' . $currentYear . '-' . rand(500, 2000);
        $passwordHash = password_hash($passwordPlain, PASSWORD_BCRYPT);
        $email = strtolower($firstname . $lastname . '@company.com');

        $developers[] = [
            'username' => $username,
            'password' => $passwordHash,
            'clear_password' => $passwordPlain,
            'name' => $firstname . ' ' . $lastname,
            'position' => $positions[$positionIndex]['name'],
            'salary' => $positions[$positionIndex]['salary'],
            'email' => $email,
            'role' => $roles[$roleIndex]
        ];
    }

    return $developers;
}
?>

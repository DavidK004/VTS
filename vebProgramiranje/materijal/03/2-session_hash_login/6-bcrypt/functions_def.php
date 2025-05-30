<?php


/** Redirects to the given URL and exits.
 * @param string $url
 * @return void
 */
function redirection(string $url)
{
    header("Location: $url");
    exit();
}


/** Checks user login against the database using PDO.
 * @param string $username
 * @param string $password
 * @param PDO $connection
 * @return array
 */
function checkUserLogin(string $username, string $password, PDO $connection): array
{

    $sql = "SELECT id, password FROM users_bcrypt WHERE username = :username LIMIT 1";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $data = [];

    if ($stmt->rowCount() > 0) {
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $record['password'])) {
            $data['id'] = (int)$record['id'];
            $data['username'] = $username;
        }
    }

    return $data;
}
<?php

/**
 * Function redirects user to given url
 *
 * @param string $url
 */
function redirection(string $url)
{
    header("Location:$url");
    exit();
}


/** Function checks that user exists in users table
 *
 * @param string $username
 * @param string $password
 * @return array
 */
function checkUserLogin(string $username, string $password): array
{
    global $connection;
  
    $sql = "SELECT id, username FROM users_md5
            WHERE username = '$username'
            AND password = md5('$password')";


//    echo $sql;
//    exit();

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_array($result)) {
            $data['id'] = (int)$record['id'];
            $data['username'] = $record['username'];
        }
    }
    return $data;

}



?>

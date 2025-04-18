<?php
require 'db_config.php';

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {

    //$sql = "SELECT * FROM workers";

    $sql = "SELECT id_worker, job, name FROM workers";

    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    //var_dump($result);

    //echo mysqli_num_fields($result)."<br>";
    //echo mysqli_num_rows($result)."<br>";

    if (mysqli_num_rows($result) > 0) {

//        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//        var_dump($row);
//        exit();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) // MYSQLI_ASSOC, MYSQLI_BOTH,MYSQLI_NUM
        {
            //var_dump($row);
            //echo $row[0] . " " . $row[1] . "<br>";
            echo $row["id_worker"] . " " . $row["name"] . "<br>";

        }
        mysqli_free_result($result);
    } else
        echo "No results!";
mysqli_close($connection);
// https://dev.mysql.com/doc/refman/8.0/en/data-types.html
}
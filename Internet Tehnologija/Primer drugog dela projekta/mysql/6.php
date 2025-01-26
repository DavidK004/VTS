<?php
require 'db_config.php';
//$search = $_POST['search']; // t, VTS, VTS2
$search = "t";
// "%_s%"  vts vvts

$sql = "SELECT * FROM workers
        WHERE name LIKE '%$search%'"; // %vt%
/*
 LIKE '_t_'
*/
$sql = "SELECT id_worker,name,job,salary FROM workers
        WHERE job IN('programmer','boss','designer')
        AND salary BETWEEN 10 AND 3000
        AND date NOT BETWEEN 2010-01-01 AND 2021-01-12";

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) // MYSQLI_ASSOC, MYSQLI_BOTH
    {
        echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . "<br />";
    }
    mysqli_free_result($result);
}

mysqli_close($connection);
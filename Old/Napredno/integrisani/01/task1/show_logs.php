<?php
require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "/functions.php");

$connection = connectDatabase($dsn, $pdoOptions);

$logData = getLogData($connection);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Show Logs</title>
</head>

<body>
    <table>
        <tr>
            <th>No.</th>
            <th>User Agent</th>
            <th>Ip Address</th>
            <th>Country</th>
            <th>Proxy</th>
            <th>Device Type</th>
            <th>Isp</th>
            <th>Date</th>
        </tr>

        <?php 
        $num = 0;
        foreach ($logData as $key => $value) {
            $hasProxy = $value['proxy'] ? "Yes" : "No";
            $num++;
            ?>
            <tr class="<?= $value['device_type'] ?>">
                <td><?= $num?>.</td>
                <td><?= $value['user_agent']?></td>
                <td><?= $value['ip_address']?></td>
                <td><?= $value['country']?></td>
                <td><?= $hasProxy?></td>
                <td><?= ucfirst($value['device_type'])?></td>
                <td><?= $value['isp']?></td>
                <td><?= $value['date']?></td>
            </tr>
            <?php
        } ?>
    </table>
</body>

</html>
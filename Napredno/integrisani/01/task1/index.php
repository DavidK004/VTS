<?php
require_once(dirname(__FILE__) . "/config.php");
require_once(dirname(__FILE__) . "/functions.php");
require_once(dirname(__FILE__) . "/vendor/autoload.php");

date_default_timezone_set('Europe/Belgrade');

function setDelayCookie()
{
    if (!isset($_COOKIE['VISITED'])) {
        setcookie("VISITED", "YES", time() + 10, "/");
    }
}


use Detection\MobileDetect;

$detect = new MobileDetect();

$_SERVER['HTTP_X_FORWARDED_FOR'] = '175.45.176.91'; //za testiranje jer inace getipadrress vraca 127.0.0.1
$ipAddress = getIpAddress();

$connection = connectDatabase($dsn, $pdoOptions);

$iplocateApiKey = "7eb5b16913c41a36afc881f2e203c4e6";
$urlApi1 = "https://www.iplocate.io/api/lookup/$ipAddress?apikey=$iplocateApiKey";


if (!isset($_COOKIE["VISITED"])) {
    $response = getCurlData($urlApi1);
    if ($response) {
        setDelayCookie();
        $data = json_decode($response, true);
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $isProxy = $data['privacy']['is_proxy'] ?? null;
        $proxy = $isProxy ? 1 : 0;

        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
        insertIntoLog($connection, $userAgent, $data['ip'], $deviceType, $data['asn']['country_code'], $proxy, $data['company']['name']);
    } else {
        echo "<h3>iplocate.io</h3>Request failed<hr>";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>

<body>
    <a href="show_logs.php">Show Logs</a>
</body>

</html>
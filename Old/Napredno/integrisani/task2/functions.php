<?php
use Detection\MobileDetect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';

$detect = new MobileDetect();
$pdo = connectDatabase($dsn, $pdoOptions);

function connectDatabase(string $dsn, array $pdoOptions): PDO
{

    try {
        $pdo = new PDO($dsn, PARAMS['USER'], PARAMS['PASSWORD'], $pdoOptions);
    } catch (\PDOException $e) {
        var_dump($e->getCode());
        throw new \PDOException($e->getMessage());
    }

    return $pdo;
}

function getIpAddress(): string
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $ip = "unknown";
    }


    return $ip;
}

function getCurlData($url): string
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function getIpData($ipAddress)
{
    global $detect;

    $fields = "country";
    $url = "http://ip-api.com/json/$ipAddress?fields=$fields";

    $response = getCurlData($url);

    if ($response) {
        $data = json_decode($response, true);
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        return [
            'country' => $data['country'] ?? null,
            'device_type' => $deviceType,
            'user_agent' => $userAgent
        ];
    } else {
        return [
            'error' => 'Request failed',
            'source' => 'ip-api.com'
        ];
    }
}

function insertDanger(PDO $pdo, ?string $country, string $deviceType, string $userAgent, string $ip): bool
{
    $sql = "INSERT INTO danger (country, device_type, user_agent, ip) 
            VALUES (:country, :device_type, :user_agent, :ip)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        ':country' => $country,
        ':device_type' => $deviceType,
        ':user_agent' => $userAgent,
        ':ip' => $ip
    ]);
}
// $_SERVER['HTTP_X_FORWARDED_FOR'] = '103.14.26.0'; //za testiranje jer inace getipadrress vraca 127.0.0.1
$ipAddress = getIpAddress();

$data = getIpData($ipAddress);

function checkBanUser()
{
    global $data;
    global $ipAddress;
    global $pdo;
    if ($data['country'] == 'Mexico' || $data['country'] == 'Columbia') {
        include 'ban.php';

        insertDanger($pdo, $data['country'], $data['device_type'], $data['user_agent'], $ipAddress);
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '1b833d8c31f09c';
        $phpmailer->Password = '7ec5de5a4287d3';

        try {
            $phpmailer->setFrom("ban@example.com", 'Contact Form');
            $phpmailer->addAddress('danger@example.com', 'Your Name');

            $phpmailer->isHTML(true);
            $phpmailer->Subject = "New ban due to country";

            $phpmailer->Body = "
            <h2>New Ip banned user</h2>
            <p><strong>Country:</strong> {$data['country']}</p>
            <p><strong>Device Type:</strong> {$data['device_type']}</p>
            <p><strong>User agent:</strong> {$data['user_agent']}</p>
             <p><strong>Ip addrerss:</strong> {$ipAddress}</p>
        ";


            $phpmailer->send();

        } catch (Exception $e) {

        }
        die;
    }

}

checkBanUser();

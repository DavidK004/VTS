<?php
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$GLOBALS['pdo'] = connectDatabase($dsn, $pdoOptions);

/**
 * Establishes PDO database connection.
 *
 * @param string $dsn
 * @param array  $pdoOptions
 * @return PDO
 * @throws PDOException
 */
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


/**
 * Dohvata sve praznike iz tabele holidays.
 *
 * @return array Lista praznika kao asocijativni nizovi
 */
function getHolidays()
{
    $pdo = $GLOBALS['pdo'];

    $sql = 'SELECT * FROM holidays';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Proverava da li je danas neki praznik i prikazuje podatke ako jeste.
 * Takođe postavlja MD5 kolačić sa sloganom i šalje obaveštenje e-mailom.
 */
function dynamicHolidays()
{
    $holidays = getHolidays();
    // $todayDay = date('j');
    // $todayMonth = date('n');

    $todayDay = 31;
    $todayMonth = 12;

    foreach ($holidays as $holiday) {
        if ($holiday['day'] == $todayDay && $holiday['month'] == $todayMonth) {
            echo <<<HTML
                <div class="container mt-5">
                <div class="card mx-auto" style="max-width: 500px;">
                    <img src="pictures/{$holiday['picture']}" class="card-img-top" alt="{$holiday['name']}">
                    <div class="card-body text-center">
                    <h3 class="card-title">{$holiday['name']}</h3>
                    <p class="card-text">{$holiday['slogan']}</p>
                    <p class="text-muted">Datum: {$holiday['day']}.{$holiday['month']}.</p>
                    </div>
                </div>
                </div>
                HTML;

            setcookie('HOLIDAY_SLOGAN', md5($holiday['slogan']), time() + 900, "/");

            sendHolidayEmail($holiday['name'], $holiday['slogan']);

            return;
        }
    }

}

/**
 * Sends an email about today's holiday using PHPMailer (Mailtrap).
 *
 * @param string $holidayName Name of the holiday
 * @param string $holidaySlogan Slogan of the holiday
 * @return void
 */
function sendHolidayEmail($holidayName, $holidaySlogan)
{
    $phpmailer = new PHPMailer(true);

    try {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Username = '1b833d8c31f09c';
        $phpmailer->Password = '7ec5de5a4287d3';
        $phpmailer->Port = 2525;
        $phpmailer->CharSet = 'UTF-8';


        $phpmailer->setFrom('no-reply@example.com', 'Holiday Notifier');
        $phpmailer->addAddress('admin@vts.rs');
        $phpmailer->Subject = "Danas je praznik: $holidayName";
        $phpmailer->Body = "Danas je praznik: $holidayName\nSlogan: $holidaySlogan";

        $phpmailer->send();
    } catch (Exception $e) {
        error_log("Email could not be sent. PHPMailer Error: {$phpmailer->ErrorInfo}");
    }
}


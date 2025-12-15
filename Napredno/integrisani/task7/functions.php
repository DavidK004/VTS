<?php
require __DIR__ . '/vendor/autoload.php';
require 'config.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Faker\Factory;


function showQrCode($worker)
{
    $vcard = "BEGIN:VCARD\n";
    $vcard .= "VERSION:3.0\n";
    $vcard .= "FN:{$worker['name']} {$worker['surname']}\n";
    $vcard .= "N:{$worker['surname']};{$worker['name']};;;\n";
    $vcard .= "ORG:{$worker['company']}\n";
    $vcard .= "TITLE:{$worker['position']}\n";
    $vcard .= "TEL;TYPE=WORK,VOICE:{$worker['phone']}\n";
    $vcard .= "EMAIL:{$worker['email']}\n";
    $vcard .= "END:VCARD";

    $qrCode = new QrCode($vcard);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    return base64_encode($result->getString());
}

function generateWorkers($n = 20): array
{
    $faker = Faker\Factory::create();
    $workers = [];

    for ($i = 0; $i < $n; $i++) {
        $workers[] = [
            'name' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'company' => $faker->company(),
            'position' => $faker->jobTitle(),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->phoneNumber()
        ];
    }
    return $workers;
}

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

function insertWorkers(array $workers): void
{
    global $pdo;
    $sql = "INSERT INTO workers (name, surname, company, position, email, phone) VALUES (:name, :surname, :company, :position, :email,:phone)";

    $stmt = $pdo->prepare($sql);

    foreach ($workers as $worker) {
        $stmt->execute([
            'name' => $worker['name'],
            'surname' => $worker['surname'],
            'company' => $worker['company'],
            'position' => $worker['position'],
            'email' => $worker['email'],
            'phone' => $worker['phone']
        ]);
    }
}


function getAllWorkers(): array
{
    global $pdo;
    $sql = "SELECT * FROM workers ORDER BY worker_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getWorkers(int $page = 1, int $perPage = 10): array
{
    global $pdo;

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT * FROM workers ORDER BY worker_id LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getWorkersCount(): int
{
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM workers");
    return (int) $stmt->fetchColumn();
}
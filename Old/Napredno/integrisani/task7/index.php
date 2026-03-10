<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'functions.php';


// $newWorkers = generateWorkers();
// insertWorkers($newWorkers);
// $workers = getAllWorkers();
$perPage = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$workers = getWorkers($page, $perPage);
$totalWorkers = getWorkersCount();
$totalPages = ceil($totalWorkers / $perPage);



?>

<!DOCTYPE html>
<html>

<head>
    <title>Workers QR Codes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Workers QR Codes</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>QR Code</th>
        </tr>
        <?php foreach ($workers as $worker): ?>
            <tr>
                <td><?= htmlspecialchars($worker['name'] . ' ' . $worker['surname']) ?></td>
                <td><?= htmlspecialchars($worker['company']) ?></td>
                <td><?= htmlspecialchars($worker['position']) ?></td>
                <td><?= htmlspecialchars($worker['email']) ?></td>
                <td><?= htmlspecialchars($worker['phone']) ?></td>
                <td>
                    <img src="data:image/png;base64,<?= showQrCode($worker) ?>" alt="QR Code">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div style="margin-top: 20px; display: flex; justify-content: center;font-size: 32px">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">Prev</a>
        <?php endif; ?>

        Page <?= $page ?> of <?= $totalPages ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>">Next</a>
        <?php endif; ?>
    </div>
</body>

</html>
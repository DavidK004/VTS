<?php
declare(strict_types=1);
require_once("config.php");
require_once("functions.php");
 $data = getData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #555;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <form action="process.php" name="text-form" method="post">
        <label for="text-input">Input some text</label>
        <input type="text" id="text-input" name="text">
        <button type="submit">Send text</button>
    </form>

    <div>
         <?php if (!empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Original Text</th>
                    <th>Modified Text</th>
                    <th>Length</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['original_text']) ?></td>
                    <td><?= htmlspecialchars($row['modified_text']) ?></td>
                    <td><?= $row['length'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No data available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
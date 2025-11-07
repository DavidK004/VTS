<?php
require_once(dirname(__FILE__) . "/functions.php");
$url = "https://zlatko.stud.vts.su.ac.rs/buep/curl1/";

$html = file_get_contents($url);


preg_match('/My session name is: (\w+)!/', $html, $nameMatch);



preg_match('/random values: (\d+)/', $html, $numMatch);


if (!empty($nameMatch[1]) && !empty($numMatch[1])) {
    $name = $nameMatch[1];
    $number = (int)$numMatch[1];

    // 5. Insert into database
    if (insertRandomData($name, $number)) {
        echo "Data inserted successfully: $name - $number";
    } else {
        echo "Failed to insert data.";
    }
} else {
    echo "Failed to extract data from webpage.";
}
$lastRecords = getLastRandomValues(10);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crawler Curl</title>
</head>
 <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Random Name</th>
            <th>Random Number</th>
            <th>Date Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lastRecords as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['random_name']) ?></td>
                <td><?= htmlspecialchars($row['random_number']) ?></td>
                <td><?= htmlspecialchars($row['date_time']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<body>

</body>

</html>
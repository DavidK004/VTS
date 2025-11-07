<?php
declare(strict_types=1);
require_once("config.php");
require_once("functions.php");

$text = $_POST["text"] ?? null;

if (!empty($text)) {
    $modifiedText = processText($text);
    // var_dump($modifiedText);
    insertData($modifiedText['original'], $modifiedText['modified'], (string)$modifiedText['length']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (isset($modifiedText)) {

        $result = processText($text);

        echo "Original: " . $result['original'] . " | ";
        echo "Modified: " . $result['modified'] . " | ";
        echo "Length: " . $result['length'];
    } else {
        echo "No text submitted.";
    }
    ?>

    <a href="index.php">Go to index page</a>
</body>

</html>
<?php
require_once(dirname(__FILE__) . "/vendor/autoload.php");
require_once(dirname(__FILE__) . "/functions.php");

use Detection\MobileDetect;

$detect = new MobileDetect();

$href = '';

if ($detect->isiOS()) {
    $href = 'https://www.examples.com/defaultIos.apk';
} elseif ($detect->isAndroidOS()) {
    $href = 'https://www.examples.com/defaultAndroid.apk';
}

$_SERVER['HTTP_X_FORWARDED_FOR'] = '175.45.176.91'; //za testiranje jer inace getipadrress vraca 127.0.0.1
$ipAddress = getIpAddress();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacty Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <h1 style="margin-top: 100px;">Welcome to Contacty!</h1>
        <img src="https://cdn-icons-png.flaticon.com/512/5562/5562750.png" alt="contacty">
        <?php if ($href): ?>
            <a type="button" class="btn btn-primary btn-lg" href="<?= $href ?>">Download our app</a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
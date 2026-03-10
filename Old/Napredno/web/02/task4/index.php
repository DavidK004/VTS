<?php
if (!isset($_GET['lang'])) {
    $_GET['lang'] = 'sr';
}
$lang = $_GET["lang"];
if ($lang != "sr" && $lang != "en") {
    $lang = "sr";
}
require_once __DIR__ . "/lang/lang_{$lang}.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(LANG['form_title']) ?></title>
</head>

<body>
    <?= htmlspecialchars($lang) ?>
    <h1><?= htmlspecialchars(LANG['form_title']) ?></h1>
    <div style="max-width: 200px;">

        <form style="display: flex; flex-direction: column;">
            <label for="name"><?= htmlspecialchars(LANG['label_name']) ?></label>
            <input type="text" name="name" id="name">
            <label for="email"><?= htmlspecialchars(LANG['label_email']) ?></label>
            <input type="email" name="email" id="email">
            <label for="message"><?= htmlspecialchars(LANG['label_message']) ?></label>
            <textarea name="message" id="message"></textarea>
            <button type="submit"><?= htmlspecialchars(LANG['button_submit']) ?></button>
        </form>
        <a href="?lang=sr">SR</a> <a href="?lang=en">EN</a>
    </div>
</body>

</html>
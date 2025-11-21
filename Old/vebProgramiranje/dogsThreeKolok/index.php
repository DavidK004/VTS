<?php
require_once 'db-config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="insert-breed.php" method="post" id="insert-breed-form">
        <select name="breed-select" id="breed-select">
            <?php
            $stmt = $pdo->query('SELECT * FROM breed');
            while ($row = $stmt->fetch()) { ?>

                <option value="<?= $row['breed_id'] ?>"><?= $row['name'] ?></option>
                
            <?php } ?>
        </select>
        <br>
        <textarea name="breed_description" id="breed_description"></textarea>
        <button type="submit">submit</button>
    </form>

    <script src="scripts.js"></script>
</body>

</html>
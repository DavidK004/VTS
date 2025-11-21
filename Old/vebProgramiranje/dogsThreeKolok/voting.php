<?php
require_once 'db-config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const radios = document.querySelectorAll("input[name='breedRadio']");
            radios.forEach(function (radio) {
                radio.addEventListener("change", function () {
                    const breedId = this.value;
                    fetch('vote-submit.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'id=' + breedId
                    })
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById("result").innerHTML = data;
                        });
                });
            });
        });
    </script>

</head>

<body>
    <form onsubmit="event.preventDefault();">
        <?php
        $stmt = $pdo->query("SELECT * FROM breed");
        while ($row = $stmt->fetch()) {
            $id = 'breed_' . $row['breed_id'];
            ?>


            <input type="radio" name="breedRadio" value="<?= $row['breed_id'] ?>" id="<?= $id ?>">
            <label for="<?= $id ?>"><?= $row['name'] ?></label><br>
            <?php
        }
        ?>
    </form>
    <div id="result"></div>
</body>

</html>
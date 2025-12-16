<?php
require_once 'functions.php';
$lengths = getWordLengths();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="check.php" method="post" class="container mt-4">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control mb-3" id="message" name="message" placeholder="Enter text"
                    required>
                <label for="min_length" class="form-label">Minimum length</label>
                <select id="min_length" name="min_length" class="form-select mb-3">
                    <?php foreach ($lengths as $len): ?>
                        <option value="<?= $len ?>"><?= $len ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="max_length" class="form-label">Maximum length</label>
                <select id="max_length" name="max_length" class="form-select mb-3">
                    <?php foreach ($lengths as $len): ?>
                        <option value="<?= $len ?>"><?= $len ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Send
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
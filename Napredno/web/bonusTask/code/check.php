<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$inputWord = trim($_POST['message'] ?? '');
$minLength = (int) ($_POST['min_length'] ?? 3);
$maxLength = (int) ($_POST['max_length'] ?? 15);

if ($inputWord === '') {
    header('Location: index.php?error=' . urlencode('Input word is required.'));
    exit;
}

if ($minLength < 3 || $maxLength > 15 || $minLength > $maxLength) {
    header('Location: index.php?error=' . urlencode('Invalid word length range.'));
    exit;
}

$wordsInRange = getWordsInRange($minLength, $maxLength);
$closest = findClosestWord($inputWord, $wordsInRange);

if ($closest === null) {
    header('Location: index.php?error=' . urlencode('No words found in this length range.'));
    exit;
}
insertResult($closest['id_word'], $inputWord, $closest['distance']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check please</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/code/styles.css" rel="stylesheet">
</head>

<body>


    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Levenshtein Distance Result</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Uneta reč</th>
                            <th scope="col">Najsličnija reč</th>
                            <th scope="col">Vrednost Levenštajnovog rastojanja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= htmlspecialchars($inputWord) ?></td>
                            <td><?= htmlspecialchars($closest['word']) ?></td>
                            <td><?= $closest['distance'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
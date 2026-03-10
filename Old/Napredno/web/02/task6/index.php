<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Unos teksta</title>
</head>

<body>
    <h1>Unesite tekst</h1>
    <form action="process.php" method="post">
        <label for="user_text">Tekst:</label><br>
        <textarea name="user_text" id="user_text" rows="5" cols="40"
            placeholder="Unesite tekst ovde..."></textarea><br><br>
        <button type="submit">Pošalji</button>
    </form>
</body>

</html>
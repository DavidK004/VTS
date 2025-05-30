<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <?php 
    if(isset($_GET['error'])) {
        echo "<p style='color:red;'>Please fill out all fields correctly. Inputs must be at least 5 characters long.</p>";
    }
    
    ?>
    <h1>Insert a guide</h1>
    <form action="add_guide.php" method="POST">
        <label for="guide-name">Guide Name:</label>
        <input type="text" id="guide-name" name="guide-name" required><br><br>

        <label for="language">Language:</label>
        <input type="text" id="language" name="language" required><br><br>

        <label for="region">Region:</label>
        <input type="text" id="region" name="region" required><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>

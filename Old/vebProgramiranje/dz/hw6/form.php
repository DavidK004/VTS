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
    <h1>Apply for a scholarship</h1>
    <form action="insert.php" method="POST">
        <label for="study-program">Study Program:</label>
        <input type="text" id="study-program" name="study-program" required><br><br>

        <label for="school">School:</label>
        <input type="text" id="school" name="school" required><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
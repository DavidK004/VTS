<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$pdo = connectDb();
$developers = $pdo->query("SELECT id_developer, name FROM developers")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Create New Project</h2>
<form action="add_project.php" method="post">
    <label>Title:</label>
    <input type="text" name="title" required><br><br>
    
    <label>Description:</label>
    <textarea name="description" required></textarea><br><br>
    
    <label>Start Date:</label>
    <input type="date" name="start_date" required><br><br>
    
    <label>Finish Date:</label>
    <input type="date" name="finish_date" required><br><br>
    
    <label>Type:</label><br>
    <input type="checkbox" name="type[]" value="web"> Web
    <input type="checkbox" name="type[]" value="mobile"> Mobile
    <input type="checkbox" name="type[]" value="design"> Design
    <input type="checkbox" name="type[]" value="integrated"> Integrated<br><br>
    
    <label>Assign Developers:</label><br>
    <select name="developers[]" multiple required>
        <?php foreach($developers as $dev): ?>
            <option value="<?= $dev['id_developer'] ?>"><?= $dev['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    
    <input type="submit" value="Add Project">
</form>

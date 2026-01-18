<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (!isset($_POST['title'], $_POST['description'], $_POST['start_date'], $_POST['finish_date'], $_POST['type'], $_POST['developers'])) {
    header("Location: new_project.php");
    exit();
}

$title = $_POST['title'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$finish_date = $_POST['finish_date'];
$type = implode(',', $_POST['type']);
$developers = $_POST['developers'];

$pdo = connectDb();
$stmt = $pdo->prepare("INSERT INTO projects (title, description, start_date, finish_date, type) VALUES (:title, :description, :start, :finish, :type)");
$stmt->execute([
    ':title' => $title,
    ':description' => $description,
    ':start' => $start_date,
    ':finish' => $finish_date,
    ':type' => $type
]);

$projectId = $pdo->lastInsertId();
$insertDev = $pdo->prepare("INSERT INTO projects_developers (id_project, id_developer) VALUES (:project, :developer)");

foreach($developers as $devId) {
    $insertDev->execute([':project' => $projectId, ':developer' => $devId]);
}

echo "Project added successfully!";
?>

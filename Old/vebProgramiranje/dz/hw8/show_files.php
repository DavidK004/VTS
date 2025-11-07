<?php
require_once 'config.php';
require_once 'db_config.php';
try{
    $sql = "SELECT file_id, file_name, directory, date_time_added FROM files ORDER BY date_time_added DESC";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($files) > 0) {
        echo "<h2>Uploaded Files</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>File Name</th><th>Directory</th><th>Date Added</th></tr></thead>";
        echo "<tbody>";
        foreach ($files as $file) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($file['file_id']) . "</td>";
            echo "<td>" . htmlspecialchars($file['file_name']) . "</td>";
            echo "<td>" . htmlspecialchars($file['directory']) . "</td>";
            echo "<td>" . htmlspecialchars($file['date_time_added']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No files found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
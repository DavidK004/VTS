<?php

require_once 'config.php';
require_once 'db_config.php';

$guideName = $_POST['guide-name'];
$language = $_POST['language'];
$region = $_POST['region'];

if(mb_strlen($guideName) < 3 || mb_strlen($language) < 3 || mb_strlen($region) < 3){
    header("Location: guide_form.php?error=1");
} else {
    try {
        $sql = "INSERT INTO tour_guides (guide_name, language, region) VALUES (:guide_name, :language, :region)";
        
        $query = $connection->prepare($sql);
        
        $query->bindParam(':guide_name', $guideName, PDO::PARAM_STR);
        $query->bindParam(':language', $language, PDO::PARAM_STR);
        $query->bindParam(':region', $region, PDO::PARAM_STR);
        
        $query->execute();
        
        echo "New guide submitted successfully.";
        echo "<br>Your id is: " . $connection->lastInsertId();
        echo "<br><a href='guide_form.php'>Go back to form</a>";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }

    
}
?>

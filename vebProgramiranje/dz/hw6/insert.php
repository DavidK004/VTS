<?php

require_once 'config.php';
require_once 'db_config.php';

$studyProgram = $_POST['study-program'];
$school = $_POST['school'];
$city = $_POST['city'];

if(mb_strlen($studyProgram) < 5 || mb_strlen($school) < 5 || mb_strlen($city) < 5){
    header("Location: form.php?error=1");
} else {
    try {
        $sql = "INSERT INTO schools (study_program, school, city) VALUES (:study_program, :school, :city)";
        
        $query = $connection->prepare($sql);
        
        $query->bindParam(':study_program', $studyProgram, PDO::PARAM_STR);
        $query->bindParam(':school', $school, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        
        $query->execute();
        
        echo "New scholarship application submitted successfully.";
        echo "<br>Your id is: " . $connection->lastInsertId();
        echo "<br><a href='form.php'>Go back to form</a>";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }

    
}
?>
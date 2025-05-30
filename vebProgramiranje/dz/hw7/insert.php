<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'config.php';
require_once 'db_config.php';

$studyProgram = $_POST['study-program'];
$school = $_POST['school'];
$city = $_POST['city'];
$dateTime = date('Y-m-d H:i:s');

if(mb_strlen($studyProgram) < 5 || mb_strlen($school) < 5 || mb_strlen($city) < 5) {
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

   
   try {

       $phpmailer = new PHPMailer();
       $phpmailer->isSMTP();
       $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
       $phpmailer->SMTPAuth = true;
       $phpmailer->Port = 2525;
       $phpmailer->Username = '1b833d8c31f09c';
       $phpmailer->Password = '7ec5de5a4287d3';



       $phpmailer->addAddress('webmaster@task3.com', 'Professor');

       $phpmailer->isHTML(true);
       $phpmailer->Subject = 'School program added';
       $phpmailer->Body = "New data was inserted into the database:<br>
       Study program: {$studyProgram} <br>
       School: {$school}  <br>
       City: {$city}  <br>
       Date and time: {$dateTime}<br>";
       $phpmailer->AltBody = "New data was inserted into the database:\n
       Study program: {$studyProgram}\n
       School: {$school}\n
       City: {$city}\n
       Date and time: {$dateTime}\n";



       $phpmailer->send();
       echo 'Message has been sent';
   } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }


}
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '1b833d8c31f09c';
$phpmailer->Password = '7ec5de5a4287d3';


$firstName = $_POST['first-name'] ?? '';
$lastName  = $_POST['last-name'] ?? '';
$email     = $_POST['email'] ?? '';
$message   = $_POST['message'] ?? '';

if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($firstName) && !empty($lastName) && !empty($message)) {
        try {
        $phpmailer->setFrom("{$email}", 'Contact Form');
        $phpmailer->addAddress('support@example.com', 'Your Name');
        $phpmailer->addReplyTo($email, "$firstName $lastName");

        $phpmailer->isHTML(true);
        $phpmailer->Subject = "New message from contact form";

        $phpmailer->Body = "
            <h2>New Contact Message</h2>
            <p><strong>First Name:</strong> {$firstName}</p>
            <p><strong>Last Name:</strong> {$lastName}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
        ";

        $phpmailer->AltBody = "New message:\n
        First Name: {$firstName}\n
        Last Name: {$lastName}\n
        Email: {$email}\n
        Message: {$message}";

        $phpmailer->send();
        header("Location: contact.php?status=success");
    } catch (Exception $e) {
        header("Location: contact.php?status=error");
    }
} else{
   header("Location: contact.php?status=error");
}
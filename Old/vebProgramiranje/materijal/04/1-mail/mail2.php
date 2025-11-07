<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$phpmailer = new PHPMailer(true);
$subject = "Test email";
$to = "prowebing@gmail.com"; // enter your email address for test purposes
$body = "<h1>test</h1>";
$altBody = "Alternative body";
try {
    $phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'a216bf90d168a4';
    $phpmailer->Password = '*************';

    $phpmailer->addAttachment('coding_style_guide_sr.pdf', 'test1 pdf');
    $phpmailer->addAttachment('coding_style_guide_hu.pdf', 'test2 pdf');

    $phpmailer->setFrom('webmaster@example.com', 'Webmaster');
    $phpmailer->addAddress("prowebing@gmail.com");

    $phpmailer->isHTML(true);
    $phpmailer->Subject = $subject;
    $phpmailer->Body = $body;
    $phpmailer->AltBody = $altBody;

    $phpmailer->send();
} catch (Exception $e) {
    $message = "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}

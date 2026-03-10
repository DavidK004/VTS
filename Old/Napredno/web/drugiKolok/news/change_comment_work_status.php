<?php
session_start();
require 'functions.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'] ?? 0;
$work = $_GET['work'] ?? '';

if ($id && in_array($work, ['accepted', 'rejected'])) {
    // Dohvati korisnika i komentar pre update
    $stmt = $pdo->prepare("SELECT c.comment, c.id_user, p.title, u.email
                           FROM comments c
                           JOIN posts p ON c.id_post = p.id_post
                           JOIN users u ON c.id_user = u.id_user
                           WHERE c.id_comment=?");
    $stmt->execute([$id]);
    $data = $stmt->fetch();

    // Update statusa
    $stmt = $pdo->prepare("UPDATE comments SET work_status=? WHERE id_comment=?");
    $stmt->execute([$work, $id]);

    // Ako je rejected, posalji email korisniku
    if ($work === 'rejected') {


        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'username@example.com';
            $mail->Password = 'password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('no-reply@posts.com', 'News Site');
            $mail->addAddress($data['email']);
            $mail->isHTML(true);
            $mail->Subject = "Vaš komentar je odbijen";
            $mail->Body = "Vaš komentar za post <b>{$data['title']}</b> je odbijen.<br>
                           Komentar: {$data['comment']}<br>
                           Datum: " . date('Y-m-d H:i:s');

            $mail->send();
        } catch (Exception $e) {
            error_log("Mailer error: {$mail->ErrorInfo}");
        }
    }
}

header("Location: all_comments.php");
exit;

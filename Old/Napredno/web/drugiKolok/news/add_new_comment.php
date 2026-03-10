<?php
session_start();
require 'functions.php';
require 'vendor/autoload.php'; // za PHPMailer
$pdo = connectToDatabase(DB_PARAMS);

if (!isset($_SESSION['id_user'], $_SESSION['role']) || $_SESSION['role'] != 'user') {
    $_SESSION['error'] = "Morate biti prijavljeni kao korisnik!";
    header("Location: index.php");
    exit;
}

// Validacija
$postId = $_POST['post'] ?? '';
$status = $_POST['status'] ?? '';
$commentText = trim($_POST['comment'] ?? '');

if (!$postId || !$status || !$commentText) {
    $_SESSION['error'] = "Sva polja su obavezna!";
    header("Location: new_comment.php");
    exit;
}

// Filter komentara
$filteredComment = filterComment($commentText);

// Ubacivanje u bazu
$stmt = $pdo->prepare("INSERT INTO comments (id_user, id_post, comment, status) VALUES (?,?,?,?)");
$stmt->execute([$_SESSION['id_user'], $postId, $filteredComment, $status]);

// Slanje mejla adminu
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // promeni u svoj SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'username@example.com';
    $mail->Password = 'password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('no-reply@posts.com', 'News Site');
    $mail->addAddress('admin@posts.com');

    $stmtPost = $pdo->prepare("SELECT title FROM posts WHERE id_post=?");
    $stmtPost->execute([$postId]);
    $post = $stmtPost->fetch();

    $mail->isHTML(true);
    $mail->Subject = "Novi komentar dodat";
    $mail->Body = "Dodat je novi komentar za post: <b>{$post['title']}</b><br>
                   Komentar: {$filteredComment}";

    $mail->send();
} catch (Exception $e) {
    error_log("Mailer Error: {$mail->ErrorInfo}");
}

$_SESSION['success'] = "Komentar dodat!";
header("Location: new_comment.php");
exit;

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//  Charge manuellement les fichiers PHPMailer :
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

// Charge lefichier .env.local manuellement (car ona pas de  Dotenv)
$envFile = __DIR__ . '/.env.local';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // ignorer les commentaires
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim(str_replace('"', '', $value));
    }
} else {
    die(' Le fichier .env.local est introuvable.');
}

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $_ENV['GMAIL_USER'];
$mail->Password = $_ENV['GMAIL_PASS'];
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->CharSet = 'UTF-8';

$mail->setFrom($_ENV['GMAIL_USER'], 'Aimé NG');
$mail->addAddress('testmail@gmail.com', 'junior destinataire');
$mail->isHTML(true);
$mail->Subject = 'Confirmation de mail avec PHPMailer';
$mail->Body = '<h1>Bonjour,</h1><p>Ceci est un e-mail de confirmation envoyé avec PHPMailer via Gmail SMTP.</p>';
$mail->AltBody = 'Bonjour, Ceci est un e-mail de confirmation envoyé avec PHPMailer via Gmail SMTP.';

if (!$mail->send()) {
    echo 'Le message n\'a pas pu être envoyé.<br>';
    echo 'Erreur de Mailer: ' . $mail->ErrorInfo;
} else {
    echo 'Le message a été envoyé avec succès.';
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP(); // Specificie  que nous utilisons le protocole SMTP
$mail->Host = 'smtp.gmail.com'; // Spécifie le serveur SMTP de Gmail
$mail->SMTPAuth = true; // Active l'authentification SMTP
$mail->Username = 'junionrnochy@gmail.com'; // Votre adresse e-mail gmail
$mail->Password = 'password'; // Votre mot de passe d'application Gmail
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Active le chiffrement TLS
$mail->Port = 587; // Port TCP à utiliser
$mail->CharSet = 'UTF-8'; // Définit le jeu de caractères à UTF-8
$mail->setFrom('junionrnochy@gmail.com', 'Aimé NG'); // Adresse e-mail et nom de l'expéditeur
$mail->addAddress('testmail@gmail.com', 'junior destinataire'); // Adresse e-mail et nom du destinataire
$mail->isHTML(true); // Définit le format de l'e-mail sur HTML
$mail->Subject = 'Confirmation de  mail avec PHPMailer'; // Sujet de l'e-mail
$mail->Body = '<h1>Bonjour,</h1><p>Ceci est un e-mail de confirmation envoyé avec PHPMailer via Gmail SMTP.</p>'; // Corps de l'e-mail en HTML
$mail->AltBody = 'Bonjour, Ceci est un e-mail de confirmation envoyé avec PHPMailer via Gmail SMTP.'; // Corps de l'e-mail en texte brut

if (!$mail->send()) {
    echo 'Le message n\'a pas pu être envoyé.';
    echo 'Erreur de Mailer: ' . $mail->ErrorInfo;
} else {
    echo 'Le message a été envoyé avec succès.';
}



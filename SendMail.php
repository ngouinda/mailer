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
<?php

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

function sendEmail($receiverEmail, $subject, $body)
{
    $smtpHost = "smtp-mail.outlook.com";
    $smtpPort = 587;

    $senderEmail = "shivtourism@outlook.com";
    $password = "Tourism@123";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->Username = $senderEmail;
    $mail->Password = $password;

    //Recipients
    $mail->setFrom($senderEmail, 'Shiv Tourism');
    $mail->addAddress($receiverEmail);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();
}
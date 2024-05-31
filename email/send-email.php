<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "anamh2003@gmail.com";
    $mail->Password = 'roxg ylzl wzbb uldb';

    // Adresa Gmail ca expeditor
    $mail->setFrom("anamh2003@gmail.com", $name);

    // Adresa de la universitate ca destinatar
    $mail->addAddress("ana.humita03@e-uvt.ro", "Ana Humita");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    header("Location: sent.html");
    exit;
} catch (Exception $e) {
    echo "Mesajul nu a putut fi trimis. Eroare: {$mail->ErrorInfo}";
}
?>

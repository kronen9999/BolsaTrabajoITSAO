<?php
//incluimos la libreria del composer
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Creando una instalacia de phpmailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'friover67@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password = 'cnfawcketcrowxlf'; // Tu contraseña de correo de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('friover67@gmail.com', 'Friover');
    $mail->addAddress('stacica22eneronkio@gmail.com', 'Steven'); // Dirección del destinatario
    $mail->Subject = 'Felicidades has sido contradado';
    $mail->Body = 'Se le asigno la vacante 45654';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado exitosamente.';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>

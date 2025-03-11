<?php

include("config.php");
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($nombreC,$correoC,$mensaje){
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
    $mail->setFrom('friover67@gmail.com', 'bolsa de trabajo itsao');
    $mail->addAddress($correoC,$nombreC); // Dirección del destinatario
    $mail->Subject = 'Aceptacion de la vacante';
    $mail->Body = $mensaje;

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado exitosamente.';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
} 
}


if (isset($_POST["btnAceptar"])){

    $mensaje=$_POST["txaMensaje"];
    $idPostulacion=$_POST["hidPostulado"];

    $ConsultaSQL=$conexionSql->prepare("UPDATE postulados set MensajeAceptacion= ?,EstadoPostulacion='Aceptada' WHERE IdPostulado= ?");
    $ConsultaSQL->bind_param("si",$mensaje,$idPostulacion);
    $ConsultaSQL->execute();

    if ($ConsultaSQL->affected_rows<=0){
        echo "No se puedieron actualizar los campos";
    }else{
        header("Location:../views/AdministrarCandidatos.php");
    }
    $ConsultaSQL->close();

}


?>
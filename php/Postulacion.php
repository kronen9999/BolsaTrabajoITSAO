<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include("config.php");

// Función para el envío de email
function EnvioEmail($idVacante, $idCandidato) {
    require '../vendor/autoload.php'; // Asegúrate de que la ruta al autoload de Composer sea correcta
    global $conexionSql; // Asegúrate de que la conexión a la base de datos sea accesible

    // Inicializar variables
    $correoC = "";
    $nombreC = "";
    $correoR = "";
    $nombreR = "";
    $nombreV = "";

    // Obtener datos de la base de datos
    $cadenaDatoscorreo = $conexionSql->prepare("
        SELECT 
            c.Nombre as NombreCandidato,
            c.Email as CorreoCandidato,
            v.Nombre as NombreVacante,
            r.Nombre as NombreRepresentante,
            r.Email as CorreoRepresentante 
        FROM 
            candidatos as c 
        INNER JOIN 
            postulados as p ON c.idCandidato = p.IdCandidato 
        INNER JOIN 
            vacantes as v ON p.IdVacante = v.IdVacante 
        INNER JOIN 
            empresas as e ON v.IdEmpresa = e.IdEmpresa 
        INNER JOIN 
            representantes as r ON e.IdRepresentante = r.IdRepresentante 
        WHERE 
            c.idCandidato = ? AND v.IdVacante = ?
    ");
    $cadenaDatoscorreo->bind_param("ii", $idCandidato, $idVacante);
    $cadenaDatoscorreo->execute();
    $resultadoFila = $cadenaDatoscorreo->get_result()->fetch_assoc();

    // Asignar valores a las variables
    $correoC = $resultadoFila["CorreoCandidato"];
    $nombreC = $resultadoFila["NombreCandidato"];
    $nombreR = $resultadoFila["NombreRepresentante"];
    $correoR = $resultadoFila["CorreoRepresentante"];
    $nombreV = $resultadoFila["NombreVacante"];
    $cadenaDatoscorreo->close();

    // Enviar correo al candidato
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'friover67@gmail.com';
        $mail->Password = 'cnfawcketcrowxlf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('friover67@gmail.com', 'Bolsa de trabajo Itsao');
        $mail->addAddress($correoC, $nombreC);
        $mail->Subject = 'Aviso de postulación en la plataforma bolsa de trabajo';
        $mail->Body = 'Buen día ' . $nombreC . ', le avisamos que se registró correctamente a la vacante ' . $nombreV .
                      ".\nPor favor, esté atento a la plataforma para continuar con el proceso de selección.";

        $mail->send();
    } catch (Exception $e) {
        // Manejo de errores
        echo "Error al enviar el correo al candidato: {$mail->ErrorInfo}";
    }

    // Enviar correo al representante
    $mail2 = new PHPMailer(true);
    try {
        $mail2->isSMTP();
        $mail2->Host = 'smtp.gmail.com';
        $mail2->SMTPAuth = true;
        $mail2->Username = 'friover67@gmail.com';
        $mail2->Password = 'cnfawcketcrowxlf';
        $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail2->Port = 587;

        $mail2->setFrom('friover67@gmail.com', 'Bolsa de trabajo Itsao');
        $mail2->addAddress($correoR, $nombreR);
        $mail2->Subject = 'Aviso de postulación en la plataforma bolsa de trabajo';
        $mail2->Body = 'Estimado ' . $nombreR . ', le informamos que el candidato ' . $nombreC . ' se ha postulado a la vacante ' .
                       $nombreV . ".\nPor favor, esté atento a la plataforma.";

        $mail2->send();
    } catch (Exception $e) {
        // Manejo de errores
        echo "Error al enviar el correo al representante: {$mail2->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuarioP = isset($_SESSION["idUsuario"]) ? $_SESSION["idUsuario"] : -1;
    $datosCompletos = true;
    $consultaDatos = $conexionSql->prepare("select idCandidato,Usuario,Contraseña,ImagenPerfil,Nombre,FechaNacimiento,Domicilio,RFC,Telefono,Telefono2,Sexo,DisponibilidadViaje,DisponibilidadResidencia,EstadoCivil,Email,CvDigital,
    IdEspecialidad from candidatos WHERE IdCandidato = ?");
    $consultaDatos->bind_param("i", $idUsuarioP);
    $consultaDatos->execute();
    $resultadoComprobacion = $consultaDatos->get_result();

    $arregloDatos = [];

    while ($fila = $resultadoComprobacion->fetch_assoc()) {
        $arregloDatos[] = $fila;
    }

    foreach ($arregloDatos as $datos) {
        foreach ($datos as $clave => $valor) {
            if ($valor === null) {

                $datosCompletos = false;
                break 2;
            }
        }
    }

    if (!$datosCompletos) {
        $consultaDatos->close();
        echo "<img src='../assets/Imagenes/ImagenesBusquedaVacanteSesionCandidato/alertaPerfil.png' id='divAviso_img'>
             <center> <p id='divAviso_p'>Debe tener su perfil completo para poder postularse a alguna vacante</p></center>
              <button id='divAviso_btn'>Aceptar</button>";
        exit();
    } else {
        $idVacante = $_POST["idVacante"];
        $fecha = date("Y-m-d");
        $posibleEnvio=false;
        $cadenaComprobacion = "SELECT idPostulado as registro FROM postulados WHERE IdCandidato = ? AND idVacante = ?";
        $consultaSql = $conexionSql->prepare($cadenaComprobacion);
        $consultaSql->bind_param("ii", $idUsuarioP, $idVacante);
        $consultaSql->execute();
        $resultado = $consultaSql->get_result();

        if ($resultado->num_rows >= 1) {
            echo "<img src='../assets/Imagenes/ImagenesBusquedaVacanteSesionCandidato/noExitoso.png' id='divAviso_img'>
                  <p id='divAviso_p'>Usted ya se ha registrado a esta vacante</p>
                  <button id='divAviso_btn'>Aceptar</button>";
            $consultaSql->close();
        } else {
            $consultaSql->close();

            $cadenaSQL = "CALL insertarPostulantes (?, ?, ?)";
            $consultaSql2 = $conexionSql->prepare($cadenaSQL);
            $consultaSql2->bind_param("sii", $fecha, $idUsuarioP, $idVacante);
            $consultaSql2->execute();

            if ($consultaSql2->affected_rows >= 1) {
                echo "<img src='../assets/Imagenes/ImagenesBusquedaVacanteSesionCandidato/exitoso.png' id='divAviso_img'>
                      <center><p id='divAviso_p'> Se le ha enviado un correo de notificacion \n La vacante se ha registrado correctamente</p></center>
                      <button id='divAviso_btn'>Aceptar</button>";
                $posibleEnvio=true;
            } else {
                echo "No se pudo insertar la vacante";
                $posibleEnvio=false;
            }
            if ($posibleEnvio==false){
            exit();
            }else{
                EnvioEmail($idVacante, $idUsuarioP);
            }

            $consultaSql2->close();
        }

        $conexionSql->close();
    }
}
?>

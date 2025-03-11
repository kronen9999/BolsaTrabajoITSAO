<?php

include("config.php");

$idUsuario="";
$usuario="";
$contraseña="";
$urlImg="";

if (isset($_POST["btnIngresar"])) {
    $usuario = $_POST["txtUsuario"];
    $contraseña = $_POST["txtContraseña"];

    // Preparar la sentencia SQL con MySQLi
    $sentenciaSql = $conexionSql->prepare("SELECT * FROM candidatos WHERE Usuario = ? AND Contraseña = ?");

    if ($sentenciaSql === false) {
        die('Error preparando la consulta: ' . $conexionSql->error);
    }

    // Enlazar los parámetros con MySQLi
    $sentenciaSql->bind_param("ss", $usuario, $contraseña);
    $sentenciaSql->execute();

    // Obtener resultados y verificar el número de filas
    $result = $sentenciaSql->get_result();
    $fila=$result->fetch_assoc();
    if ($result->num_rows > 0) {
        session_start();
        $idUsuario=$fila["idCandidato"];
        $usuario=$fila["Usuario"];
        $contraseña=$fila["Contraseña"];
        $urlImg=$fila["ImagenPerfil"];
        $_SESSION["idUsuario"]=$idUsuario;
        $_SESSION["usuario"]=$usuario;
        $_SESSION["contraseña"]=$contraseña;
        $_SESSION["urlImg"]=$urlImg;
        header("Location:../views/IndexSesionCandidatos.php");
    } else {
        $idUsuario=null;
        $usuario=null;
        $contrasena=null;
        header("Location:../views/InicioSesionCandidatos.php");

    }
    $sentenciaSql->close();
}
$conexionSql->close();
?>

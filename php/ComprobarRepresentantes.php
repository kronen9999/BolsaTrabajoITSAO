<?php

include("config.php");
$idUsuario="";
$usuario="";
$contraseña="";

if (isset($_POST["btnIngresar"]))
{
    $usuario=$_POST["txtUsuario"];
    $contrasena=$_POST["txtContraseña"];

    $consultaSQL=$conexionSql->prepare("SELECT * FROM representantes WHERE Usuario=? and contraseña=?");
    if (!$consultaSQL){
       die("Hubo un error en la consulta");
    }

    $consultaSQL->bind_param("ss",$usuario,$contrasena);
    $consultaSQL->execute();
    $result=$consultaSQL->get_result();
    $fila=$result->fetch_assoc();


    if ($result->num_rows > 0) {
        session_start();
        echo"El usuario se encontro";
        $idUsuario=$fila["IdRepresentante"];
        $usuario=$fila["Usuario"];
        $contraseña=$fila["Contraseña"];
        $_SESSION["idUsuarioR"]=$idUsuario;
        $_SESSION["usuarioR"]=$usuario;
        $_SESSION["contraseñaR"]=$contraseña;
        header("Location:../views/panelPrincipalRepresentantes.php");
        
        
}
else {
    header("Location:../views/inicioSesionRepresentantes.php");
}
}


?>
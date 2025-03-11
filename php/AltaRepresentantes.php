<?php

include("config.php");

$nuevoUsuario="";
$nuevaContrasena="";
$nuevoCorreo="";

if (isset($_POST["btnAlta"])){

    $nuevoUsuario=$_POST["txtUsuario"];
    $nuevaContrasena=$_POST["txtContraseña"];
    $nuevoCorreo=$_POST["txtCorreo"];

    $cadenaSql="CALL insertarRepresentantes (?,?,?)";
$peticionSQL=$conexionSql->prepare($cadenaSql);

if (!$peticionSQL){
    die("Hubo un error en la cadena de conexion".$conexionSql->error);
}
$peticionSQL->bind_param("sss",$nuevoUsuario,$nuevaContrasena,$nuevoCorreo);
$peticionSQL->execute();


if ($peticionSQL->affected_rows>=1){
  header("Location:../views/InicioSesionRepresentantes.php");
}
else{
    echo  "Usuario no insertado";
    
}
}




?>
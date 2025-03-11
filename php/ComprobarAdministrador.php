<?php
include ("config.php");

if (isset($_POST["btnIngresar"])){
$administrador=$_POST["txtUsuario"];
$contraseña=$_POST["txtContraseña"];

$comprobacionSQl=$conexionSql->prepare("SELECT * from administradores where Administrador= ? and Contraseña= ?");
$comprobacionSQl->bind_param("ss",$administrador,$contraseña);
$comprobacionSQl->execute();
$resultadoComprobacion=$comprobacionSQl->get_result();

if ($resultadoComprobacion->num_rows<=0)
{
    $comprobacionSQl->close();
header("Location:../views/InicioSesionAdministrador.php");
exit();
}
else {
    $comprobacionSQl->close();
    header("Location:../views/PanelAdministrador.php");
}

}



?>
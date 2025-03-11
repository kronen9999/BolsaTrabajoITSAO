<?php
include("config.php");
session_start();

$nombreE="";
$rfcE="";
$estadoE="";
$direccionE="";
$telefonoE="";
$correoE="";
$descripcionE="";
$idRepresentante=isset($_SESSION["idUsuarioR"]) ? $_SESSION["idUsuarioR"] :null;

if (isset($_POST["btnActualizar"])){
    $nombreE=$_POST["txtNombre"];
$rfcE=$_POST["txtRFC"];
$estadoE=$_POST["txtEstado"];
$direccionE=$_POST["txtDireccion"];
$telefonoE=$_POST["txtTelefono"];
$correoE=$_POST["txtEmail"];
$descripcionE=$_POST["txtDescripcion"];
 
$cadenaSQl="CALL modificarEmpresas (?,?,?,?,?,?,?,?)";
$peticionSQl=$conexionSql->prepare($cadenaSQl);
$peticionSQl->bind_param("isssssss",$idRepresentante,$nombreE,$rfcE,$estadoE,$direccionE,$telefonoE,$correoE,$descripcionE);

if ($peticionSQl->execute()){
    $peticionSQl->close();
    header("Location:../views/AdministrarEmpresas.php");
}

}



?>
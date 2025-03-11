<?php
include ("config.php");
session_start();

if (isset($_POST["btnActualizar"])){
    $idRepresentante=$_SESSION["idUsuarioR"]?$_SESSION["idUsuarioR"]:$_SESSION["idUsuarioR"];
    $contraseñaR=$_POST["txtContraseña"];
    $nombreR=$_POST["txtNombre"];
    $emailR=$_POST["txtEmail"];
    $telefonoR=$_POST["txtTelefono"];
    $telefonoR2=$_POST["txtTelefono2"];
    $estadoR=$_POST["txtEstado"];

    $consultaDatos=$conexionSql->prepare("UPDATE representantes set Contraseña= ? ,
    Nombre = ? , Email= ? ,Telefono = ? ,Telefono2= ?,Estado=? WHERE IdRepresentante=?");
    $consultaDatos->bind_param("ssssssi",$contraseñaR,$nombreR,$emailR,$telefonoR,$telefonoR2,$estadoR,$idRepresentante);

    $consultaDatos->execute();

    header("Location:../views/PerfilRepresentante.php");
}




?>
<?php
session_start();

$idRepresentante= isset($_SESSION["idUsuarioR"])?$_SESSION["idUsuarioR"]:null;
$usuarioR=isset($_SESSION["usuarioR"])?$_SESSION["usuarioR"]:null;
$contraseñaR=isset($_SESSION["contraseñaR"])?$_SESSION["contraseñaR"]:null;



echo "idRepresentante:$idRepresentante <br>
    usuarioR:$usuarioR <br> contraseñaR:$contraseñaR";


?>
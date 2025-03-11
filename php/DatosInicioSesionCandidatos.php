<?php
session_start(); // Iniciar la sesión

// Acceder a las variables de sesión
$idUsuarioV = isset($_SESSION["idUsuario"]) ? $_SESSION["idUsuario"] : null;
$usuarioV = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : null;
$contraseñaV = isset($_SESSION["contraseña"]) ? $_SESSION["contraseña"] : null;
$urlImg=isset($_SESSION["urlImg"])?$_SESSION["urlImg"]:null;


echo "ID Usuario: " . $idUsuarioV . "<br>";
echo "Usuario: " . $usuarioV . "<br>";
echo "Contraseña: " . $contraseñaV . "<br>";
echo "Urlimagen: " . $urlImg . "<br>";


?>
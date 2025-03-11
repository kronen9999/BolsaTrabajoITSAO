<?php
$servidor="localhost";
$usuario="root";
$contraseña="";
$db="bolsatrabajo";

$conexionSql=mysqli_connect($servidor,$usuario,$contraseña,$db);

if ($conexionSql){
     
}
else {
    echo "No se conecto a la base de datos";
}


?>
<?php
include("config.php");



    $idVacante=$_POST["hidIdVacanteSeleccionada"];

    $peticionSQl=$conexionSql->prepare("DELETE FROM vacantes WHERE IdVacante= ?");
    $peticionSQl->bind_param("i",$idVacante);
    $peticionSQl->execute();

    if($peticionSQl->affected_rows>0){
header("Location:../views/AdministrarVacantes.php");
exit;
    }
    else{
        echo "Hubo un error en la consulta $idVacante";
    }




?>
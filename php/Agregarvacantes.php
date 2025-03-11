<?php
session_start();
include ("config.php");

if(isset($_POST["btnAgregar"])){
    $nombreV=$_POST["txtNombreV"];
    $edadV=$_POST["txtEdadV"];
    $requisitosV=$_POST["txtRequisitos"];
    $prestacionesV=$_POST["txtPrestaciones"];
    $sexoPreferidoV=$_POST["txtSexoPreferido"];
    $disponibilidadTiempoV=$_POST["txtDisponibilidadTiempo"];
    $sueldoV=$_POST["txtSueldo"];
    $horarioV=$_POST["txtHorario"];
    $descipcionV=$_POST["txtDescripcion"];
    $idEmpresaV=isset($_SESSION["idEmpresa"])?$_SESSION["idEmpresa"]:"";

    $cadenaSql="call  insertarVacantes (?,?,?,?,?,?,?,?,?,?)";
    $peticionSQl=$conexionSql->prepare($cadenaSql);
    $peticionSQl->bind_param("ssssssdssi",$nombreV,$edadV,$requisitosV,$prestacionesV,$sexoPreferidoV,$disponibilidadTiempoV,
    $sueldoV,$horarioV,$descipcionV,$idEmpresaV);
   if ($peticionSQl->execute()){
    header("Location:../views/Administrarvacantes.php");
    exit;
}else {
    header("Location:../views/Administrarvacantes.php");
    exit;
}


}

?>
<?php
include("config.php");
session_start();

$idRepresentante = isset($_SESSION["idUsuarioR"]) ? $_SESSION["idUsuarioR"] : null;
$urlImagen = isset($_SESSION["urlImgEmpresa"]) ? $_SESSION["urlImgEmpresa"] : null;

if ($idRepresentante && $urlImagen) {
    
    $consultaSql = $conexionSql->prepare("DELETE FROM empresas WHERE IdRepresentante = ?");
    $consultaSql->bind_param("i", $idRepresentante);

    if ($consultaSql->execute()) {
       
        if (file_exists($urlImagen)) {
            unlink($urlImagen);
        }
        
        
        header("Location: ../views/AdministrarEmpresas.php");
        exit; 
    } else {
        
        echo "Error al eliminar el registro en la base de datos.";
    }

    $consultaSql->close(); // Cerrar la consulta preparada
} else {
    echo "No se encontró idRepresentante o urlImagen válidos.";
}
?>

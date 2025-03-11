<?php
session_start();
include("config.php");
$usuario=isset($_SESSION["usuario"]) ? $_SESSION["usuario"] :"";
$contraseñaND="";
$urlImagenND=isset($_SESSION["urlImg"]) ? $_SESSION["urlImg"] :"";
$nombreND="";
$fechaNacimientoND="";
$domicilioND="";
$rfcND="";
$telefonoND="";
$telefono2ND="";
$sexoND="";
$disponibilidadViajeND="";
$disponibilidadResidenciaND="";
$estadoCivilND="";
$emailND="";
$cvDigitalND="";
$idEspecialidadND="";
$alumnoTec=null;
$noControl=null;
if (isset($_POST["btnActualizar"])) {
    $nombreND=$_POST["txtNombre"];
    $contraseñaND=$_POST["txtContraseña"];
    $fechaNacimientoND=$_POST["txtfechaN"];
    $domicilioND=$_POST["txtDomicilio"];
    $rfcND=$_POST["txtRfc"];
    $telefonoND=$_POST["txtTelefono"];
    $telefono2ND=$_POST["txtTelefono2"];
    $sexoND=$_POST["cmbSexo"];
    $disponibilidadViajeND=$_POST["cmbDispViaje"];
    $disponibilidadResidenciaND=$_POST["cbmDispRes"];
    $estadoCivilND=$_POST["cmbEstadoCivil"];
    $emailND=$_POST["txtCorreo"];
    $cvDigitalND=$_POST["txtCv"];
    $idEspecialidadND=$_POST["cmbEspecialidad"];
    $noControl=isset($_POST["txtNoControl"])?$_POST["txtNoControl"]:null;
    if ($noControl){
        $alumnoTec="Verdadero";
        
    }
    
}
// Directorio donde se moverán los archivos subidos
$target_dirDoc = "../Documentos/"; // Asegúrate de incluir la barra al final

// Asegurarse de que el directorio existe
if (!is_dir($target_dirDoc)) {
    mkdir($target_dirDoc, 0777, true);
}


// Ruta completa del archivo destino
$target_fileDoc = $target_dirDoc .$usuario. basename($_FILES["fileDoc"]["name"]);
$uploadOkDoc = 1;
$fileTypeDoc = strtolower(pathinfo($target_fileDoc, PATHINFO_EXTENSION));
$file_pathDoc="";
$docCorrecto=true;



// Verificar si el archivo ya existe
if (file_exists($target_fileDoc)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOkDoc = 0;
}

// Verificar el tamaño del archivo (opcional)
if ($_FILES["fileDoc"]["size"] > 5000000) { // 5 MB
    echo "Lo siento, el archivo es demasiado grande.";
    $uploadOkDoc = 0;
    $docCorrecto=false;
}

// Permitir ciertos formatos de archivo (opcional)
$allowed_typesDoc = array("pdf", "doc", "docx");
if (!in_array($fileTypeDoc, $allowed_typesDoc)) {
    echo "Lo siento, solo se permiten ciertos tipos de archivos.";
    $uploadOkDoc = 0;
    $docCorrecto=false;
}

// Verificar si $uploadOk está configurado en 0 por un error
if ($uploadOkDoc == 0) {
    echo "Lo siento, tu archivo no fue subido.";
    $docCorrecto=false;
} else {
    // Si todo está bien, intenta subir el archivo
    if (move_uploaded_file($_FILES["fileDoc"]["tmp_name"], $target_fileDoc)) {
        echo "El archivo " . htmlspecialchars(basename($_FILES["fileDoc"]["name"])) . " ha sido subido.";
        // Guardar la ruta del archivo
        $file_pathDoc = $target_fileDoc;
        $cvDigitalND=$file_pathDoc;
        echo " La ruta del archivo es: " . $file_pathDoc;

        
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}
 
if ($docCorrecto){
    
    $cadenaSQL="CALL modificarCandidatos(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $peticionSQL=$conexionSql->prepare($cadenaSQL);
    $peticionSQL->bind_param("sssssssssssssssi",$usuario,$contraseñaND,$urlImagenND,$nombreND,$fechaNacimientoND,$domicilioND,$rfcND,$telefonoND,$telefono2ND,$sexoND,$disponibilidadViajeND,$disponibilidadResidenciaND,$estadoCivilND,$emailND,$cvDigitalND,$idEspecialidadND);
    $peticionSQL->execute();
    

    if ($peticionSQL->affected_rows==1){
      $peticionSQL->close();
    $peticionSQLm=$conexionSql->prepare("UPDATE candidatos set AlumnoTec=?,NoControl=? WHERE Usuario=?");
    $peticionSQLm->bind_param("sis",$alumnoTec,$noControl,$usuario);
    $peticionSQLm->execute();
    header("Location:../views/PerfilPostulante.php");
    echo"Aqui se ejecuto $alumnoTec $noControl";
    }else{
        echo"parece que hubo un error";
    }

}else {
    echo "Hubo algun error";
}
    
?>

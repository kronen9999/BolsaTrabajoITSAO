<?php

include("config.php");

$nuevoUsuario = "";
$nuevaContrasena = "";
$nuevoEmail = "";
$urlImagen = "";

if (isset($_POST["btnAlta"])) {
    $nuevoUsuario = $_POST["txtUsuario"];
    $nuevaContrasena = $_POST["txtContraseña"];
    $nuevoEmail = $_POST["txtCorreo"];
    
    // Manejar la subida de la imagen
    $target_dir = "../uploads/"; // Directorio donde se guardarán las imágenes
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir .$nuevoUsuario. basename($_FILES["selFoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Verificar si el archivo es una imagen real
    $check = getimagesize($_FILES["selFoto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
    
    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }
    
    // Verificar el tamaño del archivo
    if ($_FILES["selFoto"]["size"] > 500000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }
    
    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }
    
    // Verificar si $uploadOk es 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    // Si todo está bien, intenta subir el archivo
    } else {
        if (move_uploaded_file($_FILES["selFoto"]["tmp_name"], $target_file)) {
            $urlImagen = $target_file;
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }

    // Insertar en la base de datos si la imagen fue subida correctamente
    if ($urlImagen) {
        $cadenaSQL = "INSERT candidatos(Usuario,Contraseña,Email,ImagenPerfil) VALUES(?,?,?,?)";
        $consultaSql = $conexionSql->prepare($cadenaSQL);
        if (!$consultaSql) {
            die("Hubo un error en la consulta: " . $conexionSql->error);
        }
        
        $consultaSql->bind_param("ssss", $nuevoUsuario, $nuevaContrasena, $nuevoEmail, $urlImagen);
        $consultaSql->execute();
    
        if ($consultaSql->affected_rows >= 1) {
            header("Location:../views/InicioSesionCandidatos.php");
        } else {
            
        }
    
        $consultaSql->close();
    }
}
?>




*/

include("config.php");

$nuevoUsuario = "";
$nuevaContrasena = "";
$nuevoEmail="";



if (isset($_POST["btnAlta"])) {
    $nuevoUsuario = $_POST["txtUsuario"];
    $nuevaContrasena = $_POST["txtContraseña"];
    $nuevoEmail = $_POST["txtCorreo"];


    $cadenaSQL="CALL insertarCandidatos (?,?,?,?)";
    $consultaSql = $conexionSql->prepare($cadenaSQL);
    if (!$consultaSql) {
        die("Hubo un error en la consulta: " . $conexionSql->error);
    }
    
   
    $consultaSql->bind_param("ssss", $nuevoUsuario, $nuevaContrasena);
    $consultaSql->execute();

    if ($consultaSql->affected_rows >= 1) {
        header("Location:../views/InicioSesionCandidatos.php");
    } else {
        echo"Parece que no se insertaron los datos";
        
    }

    
    $consultaSql->close();
}
*/
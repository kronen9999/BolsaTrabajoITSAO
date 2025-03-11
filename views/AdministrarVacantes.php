<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar vacantes</title>
    <link rel="stylesheet" href="../css/AdministrarVacantes.css">
</head>
<body>
<div id="menuDesplegable">
    <p  mensajeUsuario="Usuario"> <?php session_start();  if (isset($_SESSION["usuario"])){print($_SESSION["usuario"]);} session_write_close();?></p>
<img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesionMenu" >
                <p linea="divisora"></p>
                      <div>
                      <a href="../views/PerfilRepresentante.php">Administrar perfil</a>                 
                      <a href="../views/PerfilRepresentante.php"><img src="../assets/Imagenes/ImagenesMenuCandidato/iconoIInformacionCandidato.png" alt="" srcset=""></a>                 
                      </div>
                      <div>
                      <a href="../php/CierreSesionCandidatos.php">Cerrar sesion</a>            
                         <a href="../php/CierreSesionCandidatos.php"><img src="../assets/Imagenes/ImagenesMenuCandidato/iconoCerrarSesion.png" alt=""></a>            
                      </div>
                             </div>
<header>
         <img src="../assets/Imagenes/ImagenesIndex/LogoRecluTrabajo.png" alt="Logotipo">
         <p>BOLSA DE TRABAJO ITSAO</p>
        <nav>
           
            <ul>
                <li><a href="PanelPrincipalRepresentantes.php">Panel principal</a></li>
                <li><button id="btnMenu"><img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesion"></button>
               
            </li>
                
            </ul>
        </nav>
    </header>
    <section class="SectionContainer">
<?php
include("../php/config.php");
session_start();

$idRepresentante=isset($_SESSION["idUsuarioR"]) ? $_SESSION["idUsuarioR"] :"";
$peticionSQl=$conexionSql->prepare("SELECT * FROM empresas WHERE IdRepresentante= ? ");
$peticionSQl->bind_param("i",$idRepresentante);
$ResultadoConsulta=null;

$idEmpresa=null;

if ($peticionSQl->execute()){
$ResultadoConsulta=$peticionSQl->get_result();

if ($ResultadoConsulta->num_rows<=0){
    $peticionSQl->close();
    $peticionSQl->get_result();
echo "<div class='SinEmpresas'><p>Para poder registrar una vacante primero debe de registrar una empresa si aun no tiene una<a href='AdministrarEmpresas.php'> de click aqui para registrar una</a></p></div>";
}
else{
$ResultadoConsulta=$ResultadoConsulta->fetch_assoc();
$idEmpresa=$ResultadoConsulta["IdEmpresa"];
$_SESSION["idEmpresa"]=$idEmpresa;
$peticionSQl->close();
echo "<button class='btnAgregarVacante'>
Agregar Vacante 
</button><input type='hidden' name='hidIdEmpresa' value='$idEmpresa'>
<div class='contendorVacantes'>";
$peticionSQL2=$conexionSql->prepare("SELECT * FROM vacantes WHERE IdEmpresa= ? ");
$peticionSQL2->bind_param("i",$idEmpresa);
$peticionSQL2->execute();
$ResultadoConsulta2=$peticionSQL2->get_result();

if($ResultadoConsulta2->num_rows<=0){

    $peticionSQL2->close();
echo "<P>Valla parece que aun no ha registrado ninguna vacante</p>";
}
else{
$peticionSQL3=$conexionSql->prepare("SELECT * FROM vacantes WHERE IdEmpresa= ? ");
$peticionSQL3->bind_param("i",$idEmpresa);
$peticionSQL3->execute();
$ResultadoConsulta3=$peticionSQL3->get_result();


while ($fila=$ResultadoConsulta3->fetch_assoc()){
$idVacante=$fila["IdVacante"];
$nombreV=$fila["Nombre"];
$edadV=$fila["Edad"];
$requisitosV=$fila["Requisitos"];
$prestacionesV = $fila["Prestaciones"];
$sexoPreferidoV=$fila["SexoPreferido"];
$disponibilidadTiempoV=$fila["DisponibilidadTiempo"];
$sueldoV=$fila["Sueldo"];
$HorarioV=$fila["Horario"];
$descripcionV=$fila["Descripcion"];
echo "<div class='Vacante' idVacante='$idVacante' nombreV='$nombreV' edadV='$edadV' requisitosV='$requisitosV'
prestacionesV='$prestacionesV' sexoPreferidoV='$sexoPreferidoV' disponibilidadTiempoV='$descripcionV' sueldoV='$sueldoV' horarioV='$HorarioV'
descripcionV='$descripcionV'>
<p>Nombre de la vacante:$nombreV</p>

<form class='Vacante_botones'  action='../php/EliminarVacante.php' method='POST' idVacante='$idVacante'>
<input type='hidden' value=$idVacante name='hidIdVacante'>
<input type='hidden' value='' name='hidIdVacanteSeleccionada'>
<button type='button' btn='eliminar' name='btnEliminarVacante'><img src='../assets/Imagenes/ImagenesAdministrarVacantes.php/Eliminar.png'></button>
<button type='button' btn='editar'><img src='../assets/Imagenes/ImagenesAdministrarVacantes.php/Actualizar.png'></button>
</form>
</div>";
}

}
echo "</div>";
}
    
}


?>

        </section>
<footer>
    <div class="divfooter_p">
        <p>Siguenos en </p>
    </div>
    <div class="divfooter_img">
        <a href="https:facebook.com" target="blank" ><img src="../assets/Imagenes/ImagenesBusquedaVacante/iconoFacebook.png" alt="iconoFacebook" ></a>
        <a href="https:whatsapp.com" target="blank"><img src="../assets/Imagenes/ImagenesBusquedaVacante/iconoWhatsapp.png" alt="iconoWhatsapp"></a>
        <a href="https:github.com" target="blank"><img src="../assets/Imagenes/ImagenesBusquedaVacante/iconoGithub.png" alt="iconoGit"></a>
        <a href="https:x.com" target="blank"><img src="../assets/Imagenes/ImagenesBusquedaVacante/iconoX.png" alt="iconoX"></a>
    </div>
    </footer>
    <script src="../js/AdministrarVacantes.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>

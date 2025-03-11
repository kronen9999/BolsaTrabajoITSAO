<?php
include ("../php/config.php");

$peticionTV=$conexionSql->prepare("Select count(*) as conteoVacantes from vacantes");
$peticionTV->execute();
$resultadoTV=$peticionTV->get_result()->fetch_assoc();
$totalVacantes=$resultadoTV["conteoVacantes"];
$peticionTV->close();

$peticionTC=$conexionSql->prepare("Select count(*) as conteoCandidatos from candidatos");
$peticionTC->execute();
$resultadoTC=$peticionTC->get_result()->fetch_assoc();
$totalCandidatos=$resultadoTC["conteoCandidatos"];
$peticionTC->close();

$peticionCG=$conexionSql->prepare("select  count(distinct c.idCandidato) as conteoCandidatosG  from candidatos as c inner join postulados as p on c.idCandidato=p.IdCandidato where c.AlumnoTec is null
");
$peticionCG->execute();
$resultadoCG=$peticionCG->get_result()->fetch_assoc();
$totalCandidatosG=$resultadoCG["conteoCandidatosG"];
$peticionCG->close();

$peticionCA=$conexionSql->prepare("select  count(distinct c.idCandidato) as conteoCandiatosA  from candidatos as c inner join postulados as p on c.idCandidato=p.IdCandidato where c.AlumnoTec='Verdadero'
");
$peticionCA->execute();
$resultadoCA=$peticionCA->get_result()->fetch_assoc();
$totalCandidatosA=$resultadoCA["conteoCandiatosA"];
$peticionCA->close();

$candiatosNoPostulados=$totalCandidatos-($totalCandidatosG+$totalCandidatosA);



echo "<input type='hidden' totalvacantes='$totalVacantes' totalCandidatos='$totalCandidatos' candiatosG='$totalCandidatosG' candidatosA='$totalCandidatosA'
candiatosNP='$candiatosNoPostulados' id='txtDatos'> ";


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <link rel="stylesheet" href="../css/PanelAdministrador.css">
    <title>Panel principal de Administrador</title>
</head>
<body>
<div id="menuDesplegable">
    <p  mensajeUsuario="Usuario"> <?php session_start();  if (isset($_SESSION["usuario"])){print($_SESSION["usuario"]);} session_write_close();?></p>
<img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesionMenu" >
                <p linea="divisora"></p>
                      <div>
                      <a href="../views/Index.php">Cerrar sesion</a>            
                         <a href="../views/index.php"><img src="../assets/Imagenes/ImagenesMenuCandidato/iconoCerrarSesion.png" alt=""></a>            
                      </div>
                             </div>
    
<header>
         <img src="../assets/Imagenes/ImagenesIndex/LogoRecluTrabajo.png" alt="Logotipo">
         <p>Bolsa de trabajo Itsao
         </p>
        <nav>
           
            <ul>
                
                <li><button id="btnMenu"><img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesion"></button>
                
            </li>
                
            </ul>
        </nav>
    </header>
    <section class="Cuerpo">
        <h2>Estadisticas de la bolsa de trabajo</h2>

        <div class="ContenedorGrafica">
            <div class="DatosGrafica">
            <h3>Total Vacantes</h3>
            <h2><?php print($totalVacantes)?></h2>
            <h3>Total Candidatos</h3>
            <h2><?php print($totalCandidatos)?></h2>
            </div>
            <div class="Grafica">

            </div>
        </div>
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
    <script src="../js/Grafica.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PerfilPostulaciones.css">
    <title>SusPostulaciones</title>
</head>
<body>
<div id="menuDesplegable">
    <p  mensajeUsuario="Usuario">Hola <?php session_start();  if (isset($_SESSION["usuario"])){print($_SESSION["usuario"]);} session_write_close();?></p>
<img src="<?php 
                session_start();
                $url=isset($_SESSION["urlImg"])?$_SESSION["urlImg"]:null;
                print($url);
                session_write_close();
                ?>" alt="imgSesionMenu" >
                <p linea="divisora"></p>
                      <div>
                      <a href="../views/PerfilPostulaciones.php">Sus Postulaciones</a>                 
                      <a href="../views/PerfilPostulaciones.php"><img src="../assets/Imagenes/ImagenesMenuCandidato/iconoPostulaciones.png" alt="" srcset=""></a>                 
                      </div>
                      <div>
                      <a href="../views/PerfilPostulante.php">Administrar perfil</a>                 
                      <a href="../views/PerfilPostulante.php"><img src="../assets/Imagenes/ImagenesMenuCandidato/iconoIInformacionCandidato.png" alt="" srcset=""></a>                 
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
                <li><a href="../views/IndexSesionCandidatos.php" style="margin-right: 10px;"></a></li>
                <li><a href="IndexSesionCandidatos.php">Inicio</a></li>
                <li><button id="btnMenu"><img src="<?php 
                session_start();
                $url=isset($_SESSION["urlImg"])?$_SESSION["urlImg"]:null;
                print($url);
                session_write_close();
                ?>" alt="imgSesion" ></button>
                
            </li>
                
            </ul>
        </nav>
    </header>
    
    <?php

     include("../php/config.php");
     session_start();

    $idUsuario=isset($_SESSION["idUsuario"])?$_SESSION["idUsuario"]:null;
     $consultaSQL=$conexionSql->prepare("Select * from postulados where IdCandidato= ?");
     $consultaSQL->bind_param("i",$idUsuario);
     $consultaSQL->execute();
     $resultadoConsulta=$consultaSQL->get_result();

     

     if ($resultadoConsulta->num_rows<1){

      echo "<section class='seccionPostulacionesN'>
      <img src='../assets/Imagenes/ImagenesPerfilPostulaciones/Confundido.png'>
      <p>Usted no se ha postulado a ninguna vacante,cuando se postule vera aqui las postulaciones que ha echo</p>
      </section>";

      $consultaSQL->close();
     }
     else{
        $consultaSQL->close();
        $consultaSQL2=$conexionSql->prepare("SELECT e.ImagenEmpresa,v.Nombre as NombreVacante,p.IdPostulado,p.Fecha,p.EstadoPostulacion,p.MensajeAceptacion  from postulados as p inner join vacantes as v on p.IdVacante=v.IdVacante inner join
    empresas as e on v.IdEmpresa=e.IdEmpresa WHERE p.IdCandidato= ? ");
       $consultaSQL2->bind_param("i",$idUsuario);
       $consultaSQL2->execute();
       $resultadoPostulaciones=$consultaSQL2->get_result();

        echo "<section class='seccionPostulaciones'>";
        echo"<div class='contenedorPostulaciones'>";
          while($fila=$resultadoPostulaciones->fetch_assoc()){
            $idPostulacion=$fila["IdPostulado"];
            $imagenUrl=$fila["ImagenEmpresa"];
            $nombrevacante=$fila["NombreVacante"];
            $fecha=$fila["Fecha"];
            $estadoPostulacion=$fila["EstadoPostulacion"];
            $mensajeAceptacion=$fila["MensajeAceptacion"];

            echo"<div class='Postulacion' estadoPostulacion='$estadoPostulacion'; idPostulacion='$idPostulacion'; mensajeAceptacion='$mensajeAceptacion'>
                 <img src='$imagenUrl'>
                 <div>
                 <p>Nombre de la vacante:</p>
                 <p>$nombrevacante</p>
                 </div>
                 <div>
                 <p>Fecha:</p>
                 <p>$fecha</p>
                 </div>
                 <div>
                 <p>Estado de la postulacion:</p>
                 <p>$estadoPostulacion</p>
                 </div>

            </div>";


      }
        echo"</div>";
        echo"<div class='InformacionPostulaciones'>";
        echo "<p>De click a alguna postulacion para visualizar su estado</p>";
        echo"</div>";
     echo "</section>";

     }
      


    ?>

    <footer>
    <div class="divfooter_p">
        <p>Siguenos en </p>
    </div>
    <div class="divfooter_img">
        <a href="https:facebook.com" target="blank" ><img src="../assets/Imagenes/ImagenesIndex/iconoFacebook.png" alt="iconoFacebook" ></a>
        <a href="https:whatsapp.com" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoWhatsapp.png" alt="iconoWhatsapp"></a>
        <a href="https:github.com" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoGithub.png" alt="iconoGit"></a>
        <a href="https:x.com" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoX.png" alt="iconoX"></a>
    </div>
    </footer>
    <script src="../js/PerfilPostulaciones.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>

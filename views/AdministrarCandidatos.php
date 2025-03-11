<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Candidatos</title>
    <link rel="stylesheet" href="../css/AdministrarCandidatos.css">
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
    <section class="sectionPostulados">
    
    <?php
    session_start();
    include("../php/config.php");
    
    $idusuarioR=isset($_SESSION["idUsuarioR"])?$_SESSION["idUsuarioR"]:null;

    $cadenaSQl='SELECT c.Nombre as "NombreCandidato",c.ImagenPerfil,v.Nombre as "NombreVacante",e.Nombre as "NombreEmpresa" from candidatos as c inner join postulados as p on c.IdCandidato=p.IdCandidato  inner join vacantes as v  on p.IdVacante=v.IdVacante inner join empresas as e on v.IdEmpresa=e.IdEmpresa inner join representantes as r on e.IdRepresentante=r.IdRepresentante where r.IdRepresentante= ? ';

    $peticionSQl=$conexionSql->prepare($cadenaSQl);
    $peticionSQl->bind_param("i",$idusuarioR);
    $peticionSQl->execute();
     
    if($peticionSQl->get_result()->num_rows<=0){
      echo"<div class='divMensaje'>
      <p>Valla parece que ningun candidato se ha postulado a alguna vacante de su organizacion<br>cuando tenga alguien se postule a una vacante se mostrara aqui</p>
      </div>";
      $peticionSQl->close();
    exit;   
    }else{
        $peticionSQl->close();
        $cadenaSQl2='SELECT c.Nombre as "NombreCandidato",c.CvDigital,p.IdPostulado,c.ImagenPerfil,v.Nombre as "NombreVacante",e.Nombre as "NombreEmpresa" from candidatos as c inner join postulados as p on c.IdCandidato=p.IdCandidato  inner join vacantes as v  on p.IdVacante=v.IdVacante inner join empresas as e on v.IdEmpresa=e.IdEmpresa inner join representantes as r on e.IdRepresentante=r.IdRepresentante where r.IdRepresentante= ? ';

    $peticionSQl2=$conexionSql->prepare($cadenaSQl2);
    $peticionSQl2->bind_param("i",$idusuarioR);
    $peticionSQl2->execute();

    $resultado=$peticionSQl2->get_result();

        echo "<div class='titulo'>
        <p>Postulaciones registradas</p>
        </div>";
       echo"<div class='ContenedorPostulados'>";
        while ($fila=$resultado->fetch_assoc()){
            $nombreCandidato=$fila["NombreCandidato"];
            $idPostulado=$fila["IdPostulado"];
            $imagenPerfil=$fila["ImagenPerfil"];
            $nombreVacante=$fila["NombreVacante"];
            $cvDigital=$fila["CvDigital"];

        echo "<div class='Postulados'>
        <img src='$imagenPerfil'>
        <h4>Postulante</h4>
        <p>$nombreCandidato</p>
        <h4>vacante</h4>
        <p>$nombreVacante</p>
        <h4>Curriculum</h4>
        <a href=$cvDigital Tarjet='_blank'  style='text-align: center;'>Click para visualizar curriculum</a>
        <button type='button' id='BotonContratar' idPostulado=$idPostulado>Contratar</button>

        
        </div>";
        }
        echo"</div>";



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
    <script src="../js/AdministrarCandidatos.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PanelPrincipalRepresentantes.css">
    <title>Panel principal de representante</title>
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
         <p>BOLSA DE TRABJO ITSAO</p>
        <nav>
           
            <ul>
                
                <li><button id="btnMenu"><img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesion"></button>
                
            </li>
                
            </ul>
        </nav>
    </header>

    <section class="SeccionApartados">
        <p tituloApartado="1">Panel general</p>
        <a href="AdministrarEmpresas.php" adiv="1">
           <div class="SeccionApartados_div">
        <img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/ImagenEmpresa.jpg" alt="">
        <p>En este apartado usted podra registrar y gestionar su empresa</p>
    </div> 
        </a>
        <a href="AdministrarVacantes.php" adiv="1">
           <div class="SeccionApartados_div">
        <img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/ImagenVacante.jpg" alt="">
        <p>En este apartado usted podra gestionar sus vacantes publicadas</p>
    </div> 
        </a>
        <a href="AdministrarCandidatos.php" adiv="1">
           <div class="SeccionApartados_div">
        <img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/ImagenCandidatos.jpg" alt="">
        <p>En este apartado podra visualizar los candidatos a sus vacantes</p>
    </div> 
        </a>
        
    
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
</body>
<script src="../js/MenuSinSesion.js"></script>
</html>
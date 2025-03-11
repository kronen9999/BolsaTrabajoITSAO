<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/IndexSesionCandidatos.css">
    <title>Bienvenido a BOLSA DE TRABAJO ITSAO</title>
</head>
<body>
<div id="menuDesplegable">
    <p  mensajeUsuario="Usuario"> <?php session_start();  if (isset($_SESSION["usuario"])){print($_SESSION["usuario"]);} session_write_close();?></p>
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
                <li><button id="btnMenu"><img src="<?php 
                session_start();
                $url=isset($_SESSION["urlImg"])?$_SESSION["urlImg"]:null;
                print($url);
                ?>" alt="imgSesion" ></button>
                
            </li>
                
            </ul>
        </nav>
    </header>
    <section class="sectionTitulo">
     <article class="articleTitulo">
        <div style="display: flex;" >
           <p p="1"></p><p p="1_1">BOLSA DE TRABJO ITSAO</p>
        </div>
        <p p="2">"El cambio en tu futuro comienza hoy"</p>
     </article>
     <div class="divSearch">
        <form class="form_divSearch" action="BusquedaVacantesSesionCandidato.php" method="post">
         <input class="divSearch_txtBusqueda" type="text" placeholder=" Buscar un empleo" name="txtBuscar" required="">
         <button class="divSearch_btnBusqueda" type="submit" name="btnBuscar"><img src="../assets/Imagenes/IndexSesionCandidatos/Lupa.png" alt=""></button>
        </form>
     </div>
     <form class="formVacantes" action="VistaVacanteSesionCandidato.php" method="post">
       <?php
             include ("../php/config.php");

               
             const cadenaSQL="SELECT v.IdVacante,v.Nombre,v.Descripcion,e.ImagenEmpresa FROM vacantes AS v INNER JOIN empresas as e on v.IdEmpresa=e.IdEmpresa ORDER BY Nombre ";
             $ConsultaSQl=$conexionSql->prepare(cadenaSQL);
             $ConsultaSQl->execute();

             $resultado=$ConsultaSQl->get_result();

             while ($fila=$resultado->fetch_assoc()){
             
                $IdVacante=$fila["IdVacante"];
                $nombreV=$fila["Nombre"];
                $descripcionV=$fila["Descripcion"];
                $imagenUrl=$fila["ImagenEmpresa"];
                 
 
 
                 echo "<div id='divVacante' valorid='$IdVacante'>
                           <img src='$imagenUrl' valorid='$IdVacante'>
                           <div valorid='$IdVacante'>
                           <p valorid='$IdVacante'><h4 valorid='$IdVacante'>Vacante:</h4> $nombreV</p>
                           <p valorid='$IdVacante'><h4 valorid='$IdVacante'>Descripcion:</h4> $descripcionV</p>
                           </div>
                      </div>";
 

             }
             echo "<input type='hidden' value='jsjap' name='idSeleccionado'>";
             

             $conexionSql->close();

       ?>
     </form>
    </section>
    <section class="sec_Empresas">
        <p>Algunos de nuestros patrocinadores</p>
        <div class="sec_Empresas_div1">
           <img src="../assets/Imagenes/IndexSesionCandidatos/itsao.jpg" alt="">
           <img src="../assets/Imagenes/IndexSesionCandidatos/Elektra.png" alt="">
           <img src="../assets/Imagenes/ImagenesIndex/Coppel.png" alt="">
        </div>
        <div class="sec_Empresas_div2">
        <img src="../assets/Imagenes/ImagenesIndex/Empresa1.png" alt="">
        <img src="../assets/Imagenes/ImagenesIndex/Empresa2.png" alt="">
           
        </div>

    </section>
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
    <script src="../js/indexSesionCandidatos.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>
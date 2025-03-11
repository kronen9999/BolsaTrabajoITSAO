<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/BusquedaVacantes.css">
    <title>Busqueda de vacantes</title>
</head>
<body>
<div id="menuDesplegable">
                      <a style="font-size: 20px !important; color:white; margin-bottom: 10px;">Iniciar como </a>
                      <div>
                      <a href="InicioSesionAdministrador.php">Administrador</a>                 
                      <a href="InicioSesionAdministrador.php"><img src="../assets/Imagenes/ImagenesInicioSesionAdministrador/Admin.png" alt="" srcset=""></a>                 
                    </div>
                      <div>
                      <a href="InicioSesionCandidatos.php">Candidato</a>                 
                      <a href="InicioSesionCandidatos.php"><img src="../assets/Imagenes/ImagenesIndex/ImagenesMiniPanelOpciones/iconoCandidato.png" alt="" srcset=""></a>                 
                      </div>
                      <div>
                      <a href="InicioSesionRepresentantes.php">Representante</a>            
                         <a href="InicioSesionRepresentantes.php"><img src="../assets/Imagenes/ImagenesIndex/ImagenesMiniPanelOpciones/iconoRepresentante.png" alt=""></a>            
                      </div>
                             </div>
<header>
         <img src="../assets/Imagenes/ImagenesBusquedaVacante/LogoRecluTrabajo.png" alt="Logotipo">
         <p>BOLSA DE TRABAJO ITSAO</p>
        <nav>
           
            <ul>
                <li><li><a href="index.php">Inicio</a></li></li>
                
                <li><button id="btnMenu">Iniciar sesion</button>
                
            </li>
                
            </ul>
        </nav>
    </header>

    <div class="divSearch">
        <form class="form_divSearch" action="BusquedaVacantes.php" method="post">
         <input class="divSearch_txtBusqueda" type="text" placeholder=" Buscar un empleo" name="txtBuscar" required="">
         <button class="divSearch_btnBusqueda" type="submit" name="btnBuscar"><img src="../assets/Imagenes/ImagenesIndex/Lupa.png" alt=""></button>
        </form>
     </div>

     <form class="formVacantes" action="VistaVacante.php" method="post">
       <?php
             include ("../php/config.php");
            
               
             $palabraBusqueda="";
             if (isset($_POST["btnBuscar"])) {

                $palabraBusqueda="%".$_POST["txtBuscar"]."%";
             }

             


             $cadenaSQL = "SELECT e.ImagenEmpresa,v.IdVacante, v.Nombre,v.Edad, v.Requisitos, v.Prestaciones, v.SexoPreferido, v.DisponibilidadTiempo, v.Sueldo, v.Horario, v.Descripcion ,e.Nombre as NombreEmpresa
              FROM vacantes as v inner join empresas as e on v.IdEmpresa=e.IdEmpresa WHERE 
              v.Nombre LIKE ?
              OR v.Requisitos LIKE ?
              OR v.Prestaciones LIke ?
              OR v.SexoPreferido LIke ?
              OR v.DisponibilidadTiempo Like ?
              OR v.Horario LIKE ?
              OR v.Descripcion LIKE ?
              Or e.Nombre Like ?
              order by e.Nombre;";

$ConsultaSQL = $conexionSql->prepare($cadenaSQL);
$ConsultaSQL->bind_param("ssssssss",$palabraBusqueda,$palabraBusqueda,$palabraBusqueda,$palabraBusqueda,$palabraBusqueda,$palabraBusqueda,$palabraBusqueda,$palabraBusqueda);
$ConsultaSQL->execute();

             $resultado=$ConsultaSQL->get_result();

             if ($resultado->num_rows == 0) {
             $ConsultaSQL->close();
                $peticionSQL2=$conexionSql->prepare("SELECT v.IdVacante,v.Nombre,v.Descripcion,e.ImagenEmpresa FROM vacantes AS v INNER JOIN empresas as e on v.IdEmpresa=e.IdEmpresa ORDER BY Nombre ");
                $peticionSQL2->execute();
                $resultado2= $peticionSQL2->get_result();

                while ($fila2=$resultado2->fetch_assoc()){
             
                    $IdVacante=$fila2["IdVacante"];
               $nombreV=$fila2["Nombre"];
               $descripcionV=$fila2["Descripcion"];
               $imagenUrl=$fila2["ImagenEmpresa"];
    
    
                    echo "<div id='divVacante' valorid='$IdVacante'>
                          <img src='$imagenUrl' valorid='$IdVacante'>
                          <div valorid='$IdVacante'>
                          <p valorid='$IdVacante'><h4 valorid='$IdVacante'>Vacante:</h4> $nombreV</p>
                          <p valorid='$IdVacante'><h4 valorid='$IdVacante'>Descripcion:</h4> $descripcionV</p>
                          </div>
                     </div>";
    
                 }
                 echo "<input type='hidden' value='jsjap' name='idSeleccionado'>";
                 $peticionSQL2->close();
              
             }
             else {

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
             echo "<button id='btnMostrarTodasVacantes' type='button'>Mostrar todas la vacantes</button>";
            }
             $conexionSql->close();

       ?>
     </form>

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
    <script src="../js/BusquedaVacantes.js"></script>
    </footer>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminitrar empresas</title>
    <link rel="stylesheet" href="../css/AdministrarEmpresas.css">
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
       $idRepresentante=isset($_SESSION["idUsuarioR"]) ? $_SESSION["idUsuarioR"] :null;
       $resultadoConsulta=null;

       $CadenaSQL1="SELECT * FROM empresas where IdRepresentante= ?" ;
        
       $peticionSQL1=$conexionSql->prepare($CadenaSQL1);
       $peticionSQL1->bind_param("i",$idRepresentante);
       $peticionSQL1->execute();
       $resultadoConsulta=$peticionSQL1->get_result();
       if ($resultadoConsulta->num_rows<=0){
        echo"<div class='SectionTitle'>
             <p>Agregar empresa</p>
             <button id='btnMostrarFormulario'>+</button>
        </div>
        <div class='Sectionbody'>
        <p>Parece que aun no cuenta con ninguna empresa registrada <br>cuando cuente con alguna se mostrara aqui</p>
        </div>";
        $peticionSQL1->close();
       }
       else {

       
        $rutaImg="";
        $nombreE="";
        $rfcE="";
        $estadoE="";
        $direccionE="";
        $telefonoE="";
        $emailE="";
        $descripcionE="";
  
        while($fila=$resultadoConsulta->fetch_assoc()){
            $rutaImg=$fila["ImagenEmpresa"];
            $nombreE=$fila["Nombre"];
            $rfcE=$fila["RFC"];
            $estadoE=$fila["Estado"];
            $direccionE=$fila["Direccion"];
            $telefonoE=$fila["Telefono"];
            $emailE=$fila["Email"];
            $descripcionE=$fila["Descripcion"];
            $_SESSION["urlImgEmpresa"]=$rutaImg;
        }


        
        echo "<div class='SectionTitle'>
             <p>Administrar empresa</p>
        </div>
        <div class='SectionbodyEmpresa'>
        <div class='divEmpresa'>
        
        <img src='$rutaImg'>
        <div>
        <p >Empresa:</p>
        <p >$nombreE</p>
    
        </div>
        
        <div>
        <p>Rfc:</p>
        <p>$rfcE</p>
        </div>
       
        <div>
        <p>Estado:</p>
        <p>$estadoE</p>
        </div>
        
        <div>
        <p>Direccion:</p>
        <p>$direccionE</p>
        </div>
        
        <div>
        <p>Telefono:</p>
<p>$telefonoE</p>
        </div>
        
        <div pe='E'>
        <p >Email:</p>
 <p >$emailE</p>
        </div>
       
        <div>
        <p>Descripcion:</p>
<p>$descripcionE</p>
        </div>
        <button type='button' id='btnActualizar'>
        <img src='../assets/Imagenes/ImagenesAdministrarEmpresas/Actualizar.png'>
        <p>Modificar empresa</p>
        </button>

         <button type='button' id='btnEliminar'>
        <img src='../assets/Imagenes/ImagenesAdministrarEmpresas/Eliminar.png'>
        <p>Eliminar empresa</p>
        </button>
        </div>
        </div>
        <input type='hidden' name='hidImgSrcE' value='$rutaImg'>
         <input type='hidden' name='hidNombreE' value='$nombreE'>
          <input type='hidden' name='hidRFCE' value='$rfcE'>
           <input type='hidden' name='hidestadoE' value='$estadoE'>
            <input type='hidden' name='hidDireccionE' value='$direccionE'>
             <input type='hidden' name='hidTelefonoE' value='$telefonoE'>
              <input type='hidden' name='hidEmailE' value='$emailE'>
               <input type='hidden' name='hidDescripcionE' value='$descripcionE'>"
        ;
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
    <script src="../js/AdministrarEmpresas.js"></script>
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>




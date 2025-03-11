<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PerfilRepresentate.css">
    <title>Su perfil de postulante</title>
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
                <li><a href="../views/IndexSesionCandidatos.php"></a></li>
                <li><a href="PanelPrincipalRepresentantes.php">Panel principal</a></li>
                <li><button id="btnMenu"><img src="../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png" alt="imgSesion" ></button>
                
            </li>
                
            </ul>
        </nav>
    </header>
   

    <form class="Form_datos" action="../php/ModificarCamposRepresentante.php" method="POST" enctype="multipart/form-data">
      <?php
      include ("../php/config.php");
      session_start();


      $idRepresentante=isset($_SESSION["idUsuarioR"])?$_SESSION["idUsuarioR"]:null;

      $peticionSQL=$conexionSql->prepare("SELECT * FROM representantes where IdRepresentante =?");
      $peticionSQL->bind_param("i",$idRepresentante);
      $peticionSQL->execute();

      $resultado=$peticionSQL->get_result();
      $fila=$resultado->fetch_assoc();
      $usuarioR=$fila["Usuario"];
      $contraseñaR=$fila["Contraseña"];
      $nombreR=$fila["Nombre"];
      $emailR=$fila["Email"];
      $telefonoR=$fila["Telefono"];
      $telefonoR2=$fila["Telefono2"];
      $estadoR=$fila["Estado"];

      echo"<img src='../assets/Imagenes/ImagenesPanelPrincipalRepresentantes/IconoRep.png'>
      <div class='divisor'>
      <div>
      <p>Usuario</p>
      <input type='text' name='txtUsuario' value='$usuarioR' disabled=''>
      </div>
      <div>
      <p>Contraseña</p>
      <input type='password' name='txtContraseña' value='$contraseñaR'  placeholder='Ingrese su Contraseña aqui'>
      </div>
      <div>
      <p>Nombre</p>
      <input type='text' name='txtNombre' value='$nombreR' placeholder='Ingrese su nombre aqui'>
      </div>
      </div>
      
      <div class='divisor'>
      <div>
      <p>Email</p>
      <input type='text' name='txtEmail' value='$emailR' placeholder='Ingrese su email aqui'>
      </div>
      <div>
      <p>Telefono</p>
      <input type='text' name='txtTelefono' value='$telefonoR' placeholder='Ingrese su telelefono aqui'>
      </div>
      <div>
      <p>Telefono2</p>
      <input type='text' name='txtTelefono2' value='$telefonoR2' placeholder='Ingrese su segundo telefono aqui'>
      </div>
      </div>
      <div class='divisor'>
      <div>
      <p>Estado</p>
      <input type='text' name='txtEstado' value='$estadoR' placeholder='Ingrese su estado aqui'>
      </div>
      </div>
      
      
      
      <input type='submit' value='Guardar cambios' name='btnActualizar'>"
      ;




      ?>
      
    </form>
   
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
    <script src="../js/MenuSinSesion.js"></script>
</body>
</html>
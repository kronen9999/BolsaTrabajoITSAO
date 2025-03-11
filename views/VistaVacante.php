<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/VistaVacante.css">
    <title>Bienvenido a Reclu_Trabajo</title>
</head>
<body cuerpo="1">
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
         <img src="../assets/Imagenes/ImagenesVistaVacante/LogoRecluTrabajo.png" alt="Logotipo">
         <p>BOLSA DE TRABAJO ITSAO</p>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><button id="btnMenu">Iniciar sesion</button>
                
            </li>
                
            </ul>
        </nav>
    </header>
    <div  action="../php/Postulacion.php"  class="form_Vacante">
    <?php

    include ("../php/config.php");

    $IdVacante=$_POST["idSeleccionado"];

     const cadenaSQl="SELECT v.Nombre,e.Nombre as NombreEmpresa,r.Email as EmailRepresentante,e.ImagenEmpresa,e.Direccion as DireccionEmpresa,e.Estado as EstadoEmpresa,r.Telefono,r.Telefono2,v.Edad,v.Requisitos,v.Prestaciones,v.SexoPreferido,v.DisponibilidadTiempo,v.Sueldo,v.Horario,v.Descripcion,r.Nombre as NombreRepresentante
    FROM vacantes as v inner join empresas as e on v.IdEmpresa=e.IdEmpresa inner join representantes as r on e.IdRepresentante=r.IdRepresentante WHERE v.IdVacante=?";
     
    $ConsultaSQL=$conexionSql->prepare(cadenaSQl);
    if (!$ConsultaSQL)
    {
      echo "Parece que hibo un error al realizar la consultar".$conexionSql->error;
    }

    $ConsultaSQL->bind_param("i",$IdVacante);
    $ConsultaSQL->execute();

    $resultado=$ConsultaSQL->get_result();

    while($fila=$resultado->fetch_assoc()){
        $nombreVacante=$fila["Nombre"];
        $nombreEmpresa=$fila["NombreEmpresa"];
        $imagenUrl=$fila["ImagenEmpresa"];
        $edad=$fila["Edad"];
        $requisitos=$fila["Requisitos"];
        $prestaciones=$fila["Prestaciones"];
        $sexoPreferido =$fila["SexoPreferido"];
        $disponibilidadTiempo=$fila["DisponibilidadTiempo"];
        $sueldo=$fila["Sueldo"];
        $horario=$fila["Horario"];
        $descripcion=$fila["Descripcion"];
        $direccionE=$fila["DireccionEmpresa"];
        $nombreRepresentante=$fila["NombreRepresentante"];
        $emailR=$fila["EmailRepresentante"];
        $estadoE=$fila["EstadoEmpresa"];
        $telefonoR=$fila["Telefono"];
        $telefonoR2=$fila["Telefono2"];


               
       echo "<p titulo='1'>$nombreVacante</p>
             <div class='div_Apartado1'>
             <img src='$imagenUrl' alt='img'>
             <div class='div_Apartado2'>
             <p titulo='1'><center style='color:#171398; font-size:25px !important;'>INFORMACION DE LA VACANTE</center></p>
             <p titulo='1' style='display:flex;' ><b>Vacante: </b>$nombreVacante</p>
             <p><b>Empresa:</b> $nombreEmpresa</p>
             <p><b>Edad:</b> $edad años</p>
             <p><b>Requisitos:</b> $requisitos</p>
             <p><b>Pretaciones:</b> $prestaciones</p>
             <p><b>Sexo preferido:</b> $sexoPreferido</p>
             <p><b>Disponibilidad de tiempo:</b> $disponibilidadTiempo</p>
             <p><b>Sueldo:</b> $$sueldo</p>
             <p><b>Horario:</b> $horario</p>
             <p><b>Direccion:</b> $direccionE</p>
             <p><b>Estado:</b> $estadoE</p>
             </div>
             </div>
             <div class='div_Apartado3'>
             <div class='div_descripcion'>
              <p><center style='font-size:25px; color:#171398;'>DESCRIPCION</center><br>$descripcion</p>
             </div>
             <div class='div_DatosRepresentante'>
              <p><center style='font-size:25px; color:#171398; margin-bottom:-5px;'>DATOS DE CONTACTO</center><br></p>
              <p><b>Nombre del representante:</b> $nombreRepresentante</p>
              <p><b>Email:</b> $emailR</p>
              <p><b>Telefono:</b> $telefonoR</p>
              <p><b>Telefono2:</b> $telefonoR2</p>
             </div>
             </div>
            <a href='InicioSesionCandidatos.php'> <input type='submit' value='Postularse' name='btnPostularse'></a>
             <input type='hidden' value='$IdVacante' name ='idVacante'>

       ";
    }


?> 
</>
<footer>
    <div class="divfooter_p">
        <p>Siguenos en </p>
    </div>
    <div class="divfooter_img">
        <a href="https:facebook.com" target="blank" ><img src="../assets/Imagenes/ImagenesVistaVacante/iconoFacebook.png" alt="iconoFacebook" ></a>
        <a href="https:whatsapp.cm" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoWhatsapp.png" alt="iconoWhatsapp"></a>
        <a href="https:github.com" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoGithub.png" alt="iconoGit"></a>
        <a href="https:x.com" target="blank"><img src="../assets/Imagenes/ImagenesIndex/iconoX.png" alt="iconoX"></a>
     
    </div>
    </footer>
    <script src="../js/MenuSinSesion.js"></script>
    
</body>
</html>
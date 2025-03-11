<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PerfilPostulante.css">
    <title>Su perfil de postulante</title>
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
                <li><a href="../views/IndexSesionCandidatos.php"></a></li>
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
   

    <form class="Form_datos" action="../php/ModificarCamposCandidato.php" method="POST" enctype="multipart/form-data">
      <?php
      
      include ("../php/config.php");
    session_start();
      $resultadoEspecialidad="";
      $cadenaEspecialidad=$conexionSql->prepare("SELECT IdEspecialidad,Nombre FROM especialidad");
      $cadenaEspecialidad->execute();
      $resultadoEspecialidad=$cadenaEspecialidad->get_result();
      $cadenaEspecialidad->close();


      $idCandidato=isset($_SESSION["idUsuario"])?$_SESSION["idUsuario"]:null;
      $cadenaSQL="SELECT * FROM candidatos WHERE IdCandidato= ? ";
      $peticionSQl=$conexionSql->prepare($cadenaSQL);
      $peticionSQl->bind_param("i",$idCandidato);
      $peticionSQl->execute();


      $resultado=$peticionSQl->get_result();

      while ($fila=$resultado->fetch_assoc()){
         $usuario=$fila["Usuario"];
         $contraseña=$fila["Contraseña"];
         $imagenPerfil=$fila["ImagenPerfil"];
         $nombre=$fila["Nombre"];
         $fechaNacimiento=$fila["FechaNacimiento"];
         $domicilio=$fila["Domicilio"];
         $rfc=$fila["RFC"];
         $telefono=$fila["Telefono"];
         $telefono2=$fila["Telefono2"];
         $sexo=$fila["Sexo"];
         $disponibilidadViaje=$fila["DisponibilidadViaje"];
         $disponibilidadResidencia=$fila["DisponibilidadResidencia"];
         $estadoCivil=$fila["EstadoCivil"];
         $email=$fila["Email"];
         $cvDigital=$fila["CvDigital"];
         $esAlumno=$fila["AlumnoTec"];
         $NoControl=$fila["NoControl"];
         if ($fechaNacimiento==null){
            $fechaNacimiento="2000/01/01";
         }

         echo"<img src='$imagenPerfil' class='Form_datos_img '>
              <div class=Form_datos_div_1>
              <div class=Form_datos_div_Apartados>
              <p>Usuario:</p>
              <input type='text' value ='$usuario' disabled='' name='txtUsuario'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Contraseña:</p>
              <input type='password' value ='$contraseña' name='txtContraseña'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Nombre:</p>
              <input type='text' value ='$nombre' placeholder='Ingrese su nombre' name='txtNombre'>
              </div>
             <div class=Form_datos_div_Apartados>
              <p>Fecha de nacimiento:</p>
              <input type='text' value ='$fechaNacimiento' placeholder ='Ingrese su fecha de nacimiento' name='txtfechaN'>
              </div>
              </div>
               <div class=Form_datos_div_2>
               <div class=Form_datos_div_Apartados>
              <p>Domicilio:</p>
              <input type='text' value ='$domicilio' placeholder='Ingrese aqui su domicilio' name='txtDomicilio'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>RFC:</p>
              <input type='text' value ='$rfc' placeholder ='Ingrese aqui su RFC' name='txtRfc'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Telefono:</p>
              <input type='text' value ='$telefono' placeholder ='Ingrese aqui su telefono' name='txtTelefono'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Telefono2:</p>
              <input type='text' value ='$telefono2' placeholder ='Ingrese aqui su telefono de respaldo' name='txtTelefono2'>
              </div>
              </div>
              <div class='Form_datos_div_3'>
              <div class=Form_datos_div_Apartados>
              <p>Sexo:</p>
              <select name='cmbSexo'>
              <option value='Mujer'>Mujer</option>
              <option value='Hombre'>Hombre</option>
              <option value='Indistinto'>Indistinto</option>
              </select>  
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Disponibilidad de viaje:</p>
              <select name='cmbDispViaje'>
              <option value='Si'>Si</option>
              <option value='No'>No</option>
              </select>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Disponibilidad de residencia:</p>
              <select name='cbmDispRes'>
              <option value='Si'>Si</option>
              <option value='No'>No</option>
              </select>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>EstadoCivil:</p>
              <select name='cmbEstadoCivil'>
              <option value='Casado'>Casado</option>
              <option value='Soltero'>Soltero</option>
              <option value='Divorciado'>Divorciado</option>
              </select>
              </div>
              </div>
              <div class='Form_datos_div_4'>
              <div class=Form_datos_div_Apartados>
              <p>Correo:</p>
              <input type='text' value ='$email' name='txtCorreo'>
              </div>
              <div class=Form_datos_div_Apartados>
              <p>Especialidad:</p>
              <select name='cmbEspecialidad'>
         ";
         
         while ($filaE=$resultadoEspecialidad->fetch_assoc()){
            $idEspecialidad=$filaE["IdEspecialidad"];
            $NombreE=$filaE["Nombre"];
            echo"<option value='$idEspecialidad'>$NombreE</option>";
         }
         echo"</select>
               </div>
               <div>";
         
         if ($cvDigital==null){
            echo "<p>Cv:Parece que aun no sube un CV</p>
                   <input type='file' name='fileDoc'>";
         }else{
            echo "<p>Cv:<a href='$cvDigital'>Curriculo_$usuario</a></p>
                   <input type='file' name='fileDoc'>
                   <input type='hidden' value='$cvDigital' name ='txtCv'>";
         }

              echo "
              </div>
              </div>
                </div>";
           
                if ($esAlumno===null){
                    echo "<div class='AlumnoTec'>
                    <p>Eres un alumno del Itsao?</p>
                    <div class='contenedorCbx'>
                    <label for='cbxSi'>Si<input type='checkbox' value='Si'  id='cbxSi' name='cbxAlumno'></label>
                    
                    <label for='cbxNo'>No<input type='checkbox' value='No'  checked=''id='cbxNo' name='cbxAlumno'></label>
                    
                    </div>
                    </div>";
                }
                else  {
                    echo "<label for='noControl'>Numero de control</label>
                    <input type='text' value ='$NoControl' name='txtNoControl' id='noControl'>";
                }

         
      }

      ?>
      <input type="submit" name="btnActualizar" value="Guardar cambios">
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
    <script src="../js/cbxAlumno.js"></script>
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InicioSesionRepresentantes.css">
    <title>Iniciar sesion como Representante</title>
</head>
<body animacionEntradapag="1">
    <nav>
    <img src="../assets/Imagenes/ImagenesInicioRepresentantes/LogoRecluTrabajo.png" alt="imagenLogotipo">
    <p>BOLSA DE TRABAJO ITSAO</p>
        <ul>
            <li>
                <a href="index.php">Inicio</a>
                
            </li>
            <li>
                <a href="InicioSesionCandidatos.php">Iniciar sesion como candidato</a>
                <a href="InicioSesionAdministrador.php">Iniciar sesion como Administrador</a>
            </li>
        </ul>
    </nav>
    <div id="contenedor">
           <form id="contenedor_form" action="../php/ComprobarRepresentantes.php" method="post">
                   <img src="../assets/Imagenes/ImagenesInicioRepresentantes/iconoRepresentante.png" alt="iconoRepresentantes">
                   <h2>Iniciar sesion como representante</h2>
                   <p>Usuario</p>
                   <input type="text" placeholder="Ingrese su usuario aqui" name="txtUsuario" required="">
                   <p>Contraseña</p>
                   
                    <div style="display:flex" >
                      <input type="password" placeholder="Ingrese su contraseña aqui" name="txtContraseña" required="">
                      <div><img src="../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png" class="ojoCerrado" alt="imgOjo"></div>
                    </div>
                   <div style="display: flex;" ><p style="font-size: 15px;">Aun no tienes una cuenta?<p style="color:blue" >da click aqui para registrarse</p></p></div>
                   <input type="submit" name="btnIngresar" value="Ingresar">
           </form>
    </div>
    <script src="../js/InicioSesionRepresentantes.js"></script>
</body>
</html>

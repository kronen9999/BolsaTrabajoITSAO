<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InicioSesionAdministrador.css">
    <title>Iniciar sesion como Administrador</title>
</head>
<body animacionEntradapag="1">
    <nav>
    <img src="../assets/Imagenes/ImagenesInicioCandidatos/LogoRecluTrabajo.png" alt="imagenLogotipo">
    <p>BOLSA DE TRABAJO ITSAO</p>
        <ul>
            <li>
                <a href="index.php">Inicio</a>
                
            </li>
            <li>
                <a href="InicioSesionRepresentantes.php">Iniciar sesion como representante</a>
                <a href="InicioSesionCandidatos.php">Iniciar sesion como candidato</a>
            </li>
        </ul>
    </nav>
    <div id="contenedor">
           <form id="contenedor_form" action="../php/ComprobarAdministrador.php" method="post">
                   <img src="../assets/Imagenes/ImagenesInicioSesionAdministrador/Admin.png" alt="iconoCandidatos">
                   <h2>Iniciar sesion como Administrador</h2>
                   <p>Usuario</p>
                   <input type="text" placeholder="Ingrese su Usuario aqui" name="txtUsuario" required="Debes ingresar tu usuario">
                   <p>Contraseña</p>
                   
                    <div style="display:flex" >
                      <input type="password" placeholder="Ingrese su contraseña aqui" name="txtContraseña" required="">
                      <div><img src="../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png" class="ojoCerrado" alt="imgOjo"></div>
                    </div>
                   
                   <input type="submit" name="btnIngresar" value="Ingresar">
           </form>
    </div>
    <script src="../js/comportamientoOjo.js"></script>
</body>
</html>

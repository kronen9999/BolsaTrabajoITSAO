// Guardamos en constantes los elementos del formulario 
const contenedorFormulario = document.getElementById("contenedor");

   

function agregarEventos() {
    const etiquetaAltac = document.querySelector('[style="color:blue"]');
    const botonOjo=document.querySelector('[alt="imgOjo"]');
    const txtContraseña=document.querySelector('[name="txtContraseña"]');
    let ojoValor=1;
    
    botonOjo.addEventListener("click",function(e)
    {
    switch(ojoValor)
    {
    case 0:
        txtContraseña.setAttribute("type","password");
        this.setAttribute("src","../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png");
    break;
    case 1:
        txtContraseña.setAttribute("type","text");
        this.setAttribute("src","../assets/Imagenes/ImagenesInicioCandidatos/ojoAbierto.png");
        break;
    }
    ojoValor++;
    if (ojoValor>1)
        {
            ojoValor=0;
        }
        console.log(ojoValor);
    });
    

    
    if (etiquetaAltac) {
        etiquetaAltac.addEventListener("click", function(e) {
            
            // Va a editar el HTML del contenedor
            contenedorFormulario.innerHTML = `
                <form id="contenedor_form_alta" action="../php/AltaCandidatos.php" method="post" animacionActiva="Si" enctype="multipart/form-data">
                    <h2>Agregarse como candidato</h2>
                    <div id=contenedor_form_alta_divp>
                    <div id="contenedor_form_alta_div1">
                    <img src="../assets/Imagenes/ImagenesInicioCandidatos/iconoCandidatoagregar.png" alt="iconoAltacandidatos">
                    <label for="image">Selecciona una imagen</label>
                    <input type="file" name="selFoto" id='image' required="">
                    </div>
                    <div id="contenedor_form_alta_div2">
                    <p>Nuevo usuario</p>
                    <input type="text" placeholder="Ingrese un nombre de usuario" name="txtUsuario" required="">
                    <p>Correo electronico</p>
                    <input type="text" placeholder="Ingrese su Correo electronico" name="txtCorreo" required="">
                    <p>Nueva Contraseña</p>
                    <input type="password" placeholder="Ingrese una nueva contraseña" name="txtContraseña" required="">
                    <div><img src="../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png" class="ojoCerrado" alt="imgOjo" style="opacity:0;"></div>
                    
                    </div>
                    </div>
                    <div>
                        <input type="submit" name="btnAlta" value="AgregarUsuario">
                        <input type="button" id="btnCancelar" value="Cancelar">
                    </div>
                </form>
            `;
            
            const botonOjo2=document.querySelector('[alt="imgOjo"]');
            const txtContraseña2=document.querySelector('[name="txtContraseña"]');
            let ojoValor2=1;
            

            botonOjo2.addEventListener("click",function(e)
            {
            switch(ojoValor2)
            {
            case 0:
                txtContraseña2.setAttribute("type","password");
                this.setAttribute("src","../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png");
            break;
            case 1:
                txtContraseña2.setAttribute("type","text");
                this.setAttribute("src","../assets/Imagenes/ImagenesInicioCandidatos/ojoAbierto.png");
                break;
            }
            ojoValor2++;
            if (ojoValor2>1)
                {
                    ojoValor2=0;
                }
                console.log(ojoValor2);
            });
            
        
        
            // Seleccionamos el botón "Cancelar" recién agregado y le añadimos el escuchador de eventos
            const botonCancelar = document.getElementById("btnCancelar");
            botonCancelar.addEventListener("click", function(e) {
                contenedorFormulario.innerHTML = `
                <form id="contenedor_form" action="../php/ComprobarCandidatos.php" method="post" animacionActiva="Si">
                <img src="../assets/Imagenes/ImagenesInicioCandidatos/iconoCandidato.png" alt="iconoCandidatos">
                <h2>Iniciar sesion como candidato</h2>
                <p>Usuario</p>
                <input type="text" placeholder="Ingrese su usuario aqui" name="txtUsuario" required="">
                <p>Contraseña</p>
                
                 <div style="display:flex" >
                   <input type="password" placeholder="Ingrese su contraseña aqui" name="txtContraseña" required="">
                   <div><img src="../assets/Imagenes/ImagenesInicioCandidatos/ojoCerrado.png" class="ojoCerrado" alt="imgOjo" "></div>
                 </div>
                <div  style="display: flex ;" ><p style="font-size: 15px;">Aun no tienes una cuenta?<p style="color:blue" >da click aqui para registrarse</p></p></div>
                <input type="submit" name="btnIngresar" value="Ingresar">
        </form>
                `;
                // Volvemos a agregar los eventos después de modificar el contenido
                  
                  agregarEventos();
              
                
            });


        });
    }
}

// Agregamos los eventos por primera vez
agregarEventos();

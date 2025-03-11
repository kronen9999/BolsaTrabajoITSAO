document.addEventListener("DOMContentLoaded",function(){
    btnContratar= document.querySelectorAll("#BotonContratar");
    
    btnContratar.forEach(boton => {

        boton.addEventListener("click",function(){
         FormEnvio("../php/VerificarPostulaciones.php",this.getAttribute("idPostulado"));
             
        });

    });

});


function FormEnvio(destinoPhp,idVacante){

    let formulario =document.createElement("Form");
    formulario.action=destinoPhp;
    formulario.method="POST";
    formulario.classList.add("formEnvio");
    textoAviso=document.createElement("h2");
    textoAviso.textContent="Agendar cita"
    formulario.appendChild(textoAviso);
    parrafo1=document.createElement("p");
    parrafo1.textContent="Ingrese aqui el texto que el postulante va consultar una ves que sea aceptado para la vacante";
    formulario.appendChild(parrafo1);
    areaMensaje=document.createElement("textarea");
    areaMensaje.name="txaMensaje";
    formulario.appendChild(areaMensaje);
    divbotones=document.createElement("div");
    botonAceptar=document.createElement("input");
    botonAceptar.type="Submit";
    botonAceptar.value="Aceptar";
    botonAceptar.name="btnAceptar";
    botonCancelar=document.createElement("input");
    botonCancelar.type="button";
    botonCancelar.value="Cancelar";
    botonCancelar.name="btnCancelar";
    divbotones.appendChild(botonAceptar);
    divbotones.appendChild(botonCancelar);
    inputPostulado=document.createElement("input");
    inputPostulado.type="hidden"
    inputPostulado.name="hidPostulado";
    inputPostulado.value=idVacante;
    formulario.appendChild(inputPostulado);
    formulario.appendChild(divbotones);
    document.body.appendChild(formulario);

    botonCancelar.addEventListener("click",function(){
     textoAviso.value="";
     formulario.style.opacity="0";
     formulario.style.zIndex=-1;
    });
    
     
    

}
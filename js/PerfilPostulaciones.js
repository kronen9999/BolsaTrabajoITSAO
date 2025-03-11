function divMensajeNull(){
    divContendor=document.createElement("div");
    let imagen=document.createElement("img");
    imagen.src="../assets/Imagenes/ImagenesPerfilPostulaciones/atencion.png";
    imagen.id="imgAdvertencia";
    let mensaje=document.createElement("p");
    mensaje.textContent="Aun no se recibe ninguna respuesta por parte del reclutador por lo cual le pedimos estar atento a este panel";
    divContendor.appendChild(imagen);
    divContendor.appendChild(mensaje);
    return divContendor;
}

function divMensajeAprovacion(mensajeCita){
    divContendor=document.createElement("div");
    let imagen=document.createElement("img");
    imagen.src="../assets/Imagenes/ImagenesPerfilPostulaciones/aceptado.png";
    imagen.id="imgAdvertencia";
    let mensaje=document.createElement("p");
    mensaje.textContent="Felicidades el reclutador a verificado tu postulacion aqui tienes los detalles de tu cita";
    divContendor.appendChild(imagen);
    divContendor.appendChild(mensaje);
    mensajeCitaP=document.createElement("div");
    mensajeCitaP.id="mensajeCita";
    mensajeCitaP.textContent=mensajeCita;
    divContendor.appendChild(mensajeCitaP);
    return divContendor;
}

document.addEventListener("DOMContentLoaded",function(){

 divInformacion=document.querySelector(".InformacionPostulaciones");
const pHdivI=document.querySelector(".InformacionPostulaciones p");
let divspostulaciones=document.querySelectorAll(".Postulacion");
divspostulaciones.forEach(divElemento=>{

if (divElemento.getAttribute("EstadoPostulacion")=="Pendiente"){
    divElemento.style.background="yellow";
}

else if(divElemento.getAttribute("EstadoPostulacion")=="Aceptada"){
    divElemento.style.background="Green";
}

divElemento.addEventListener("click",function(e){
if (this.getAttribute("EstadoPostulacion")=="Pendiente"){

    divInformacion.innerHTML = divMensajeNull().outerHTML;

}


else if (this.getAttribute("EstadoPostulacion")=="Aceptada"){
    divInformacion.innerHTML = divMensajeAprovacion(this.getAttribute("mensajeAceptacion")).outerHTML;
  
}

});

});

});
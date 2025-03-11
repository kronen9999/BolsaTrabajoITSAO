function Enviophp() {
    var divContenedorMensaje = document.querySelector('[funcion="ComponenteAviso"]');
    var formContenedor = new FormData(document.querySelector('.form_Vacante'));
    var solicitudEnvio = new XMLHttpRequest();
    var divDifuminar=document.querySelector(".difuminar");
    solicitudEnvio.open("POST", "../php/Postulacion.php");

    solicitudEnvio.onreadystatechange = function() {
        if (solicitudEnvio.readyState == 4 && solicitudEnvio.status == 200) {
            divContenedorMensaje.innerHTML = solicitudEnvio.responseText;
            divContenedorMensaje.style.zIndex="1500";
            divContenedorMensaje.style.opacity="1";
            divDifuminar.style.zIndex="1000";
            divDifuminar.style.backdropFilter="blur(10px)";
            

            document.querySelector('[id="divAviso_btn"]').addEventListener("click",function(){
              divContenedorMensaje.style="-1";
              divContenedorMensaje.style.opacity="0";
              divDifuminar.style.zIndex="-1";
            divDifuminar.style.backdropFilter="blur(0px)";
            })
        }
        //codigo para ocultar el div 
       

    };

    solicitudEnvio.send(formContenedor);
}

document.addEventListener("DOMContentLoaded", function() {
    var botonAccion = document.querySelector('[name="btnPostularse"]');

    botonAccion.addEventListener("click", function(e) {
        Enviophp();
        e.preventDefault();
        
        
        
    });
    
});







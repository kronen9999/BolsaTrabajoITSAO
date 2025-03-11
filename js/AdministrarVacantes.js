function formularioAgregar(phpDestino){
   formulario=document.createElement("form");
   formulario.classList.add("formularioFlotante");
   formulario.action=phpDestino;
   formulario.method="POST";
   
    let nombresInput=["txtNombreV","txtEdadV","txtRequisitos","txtPrestaciones","txtSexoPreferido",
        "txtDisponibilidadTiempo","txtSueldo","txtHorario","txtDescripcion"];
        let etiquetasInput=["Nombre de la vacante","Edad minima","Requisitos","Prestaciones","Sexo preferido",
            "Disponibilidad de tiempo","Sueldo","Horario","Descripcion"];

            for (let i in nombresInput)
                {
               parrafo=document.createElement("p");
               parrafo.textContent=etiquetasInput[i];
               txtInput=document.createElement("input");
               txtInput.type="text";
               txtInput.name=nombresInput[i];
               formulario.appendChild(parrafo);
               formulario.appendChild(txtInput);
                }
        let botonCancelar=document.createElement("button");
        let botonAgregar=document.createElement("button");
        botonCancelar.type="button";
        botonAgregar.type="submit";
        botonCancelar.name="btnCancelar";
        botonAgregar.name="btnAgregar";
        botonCancelar.textContent="Cancelar";
        botonAgregar.textContent="Agregar";
        divContenedorBotones=document.createElement("div");
        divContenedorBotones.classList.add("formDivBotones");
        divContenedorBotones.appendChild(botonAgregar);
        divContenedorBotones.appendChild(botonCancelar);
        formulario.appendChild(divContenedorBotones);
     document.body.appendChild(formulario);
   console.log(formulario);
  return formulario;

}


document.addEventListener("DOMContentLoaded",function(){
 

botonAgregar=document.querySelector("[class='btnAgregarVacante']");
//metodos para el boton agregar
if (botonAgregar){
    
     formularioA=new formularioAgregar("../php/AgregarVacantes.php");
    botonAgregar.addEventListener("click",function(){
     formularioA.style.opacity="1";
     formularioA.style.zIndex="100";
    });

    botonCancelar=formularioA.querySelector("[name=btnCancelar]");
    if (botonCancelar){
    
        botonCancelar.addEventListener("click",function(){
            formularioA.style.opacity="0";
     formularioA.style.zIndex="-1";
        });

        botonCancelar=formularioA.querySelector("[name=btnAgregar]");
        
    }
    
}
formularioEliminar=document.querySelector("[action='../php/EliminarVacante.php']");

var botonesEliminar = document.querySelectorAll("[btn='eliminar']");

botonesEliminar.forEach(function(boton) {
    boton.addEventListener("click", function(e) {
        
        var idVacante = e.target.closest(".Vacante_botones").getAttribute("idVacante");
        document.querySelector("[name='hidIdVacanteSeleccionada']").setAttribute("value",idVacante);
       console.log( document.querySelector("[name='hidIdVacanteSeleccionada']"));
       formularioEliminar.submit();
        
        
    });
});

});
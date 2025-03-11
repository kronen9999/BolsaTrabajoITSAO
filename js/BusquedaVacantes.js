// funcion para hacere que los divs reaccionen como

document.addEventListener("DOMContentLoaded",function()
{
const divsApartados=this.querySelectorAll(['[id="divVacante"]']);
const formVacantes = this.querySelector('[class="formVacantes"]');
const inpEnvio=this.querySelector('[name="idSeleccionado"]');



for (var i of divsApartados)
    {
        if (formVacantes)
            {
         i.addEventListener("click",function(e){
         idSeleccionado=e.target.getAttribute('valorid');
         inpEnvio.value=idSeleccionado;
         formVacantes.submit();
        });
            }
        
    }

    let botonMostrarTodasvacantes = document.querySelector('#btnMostrarTodasVacantes');

    if (botonMostrarTodasvacantes){
        botonMostrarTodasvacantes.addEventListener("click",function(e){
        vacantesForm=document.querySelector("[action='BusquedaVacantes.php']");
        if (vacantesForm){
           vacantesForm.submit();
        }else{
            vacantesForm2=document.querySelector("[action='BusquedaVacantesSesionCandidato.php']");
            if (vacantesForm2){
                vacantesForm2.submit();
            }
        }


        });
    }

    

    

});
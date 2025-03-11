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
});
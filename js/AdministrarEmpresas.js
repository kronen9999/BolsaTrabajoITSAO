 function ComponenteFormulario(formularioEnvio)
{
 let formularioEnviar=document.createElement("Form");
 formularioEnviar.classList.add("formEnvioAlta");
 formularioEnviar.action=formularioEnvio;
formularioEnviar.method="POST";
formularioEnviar.enctype="multipart/form-data";
  let indicacionesP=["Seleccione una foto con la imagen de su empresa","Nombre","RFC","Estado","Direccion","Telefono","Correo","Descripcion"];
  let nombreInputs=["fileImg","txtNombre","txtRFC","txtEstado","txtDireccion","txtTelefono","txtEmail","txtDescripcion","btnRegistrar","btnCancelar"];
  let inputs=[];
  parrafo=document.createElement("p");
  parrafo.textContent=indicacionesP[0];
formularioEnviar.appendChild(parrafo); 
  inputs[0]=document.createElement("input");
  inputs[0].type="file";
  inputs[0].name=nombreInputs[0];
  formularioEnviar.appendChild(inputs[0]);
  for (let i =1;i<8;i++){
parrafo=document.createElement("p");
parrafo.textContent=indicacionesP[i];
formularioEnviar.appendChild(parrafo);
inputs[i]=document.createElement("input");
inputs[i].name=nombreInputs[i];
formularioEnviar.appendChild(inputs[i]);
inputs[i].type="text";
  }
  divContbotones=document.createElement("div");
  divContbotones.classList.add("ContenedorBotones");
  formularioEnviar.appendChild(divContbotones);
  inputs[8]=document.createElement("input");
  inputs[8].type="submit";
  inputs[8].name=nombreInputs[8];
divContbotones.appendChild(inputs[8]);
  inputs[9]=document.createElement("button");
  inputs[9].type="button";
  inputs[9].name=nombreInputs[9];
inputs[9].textContent="Cancelar";
  divContbotones.appendChild(inputs[9]);
  console.log(formularioEnviar);
  return formularioEnviar;
  }

  function ComponenteFormularioModificar(formularioEnvio)
{
 let formularioEnviar=document.createElement("Form");
 formularioEnviar.classList.add("formEnvioAlta");
 formularioEnviar.action=formularioEnvio;
formularioEnviar.method="POST";
formularioEnviar.enctype="multipart/form-data";
  let etiquetasTomar=["[name='hidNombreE']","[name='hidRFCE']","[name='hidestadoE']","[name='hidDireccionE']","[name='hidTelefonoE']","[name='hidEmailE']","[name='hidDescripcionE']"];
  let indicacionesP=["Nombre","RFC","Estado","Direccion","Telefono","Correo","Descripcion"];
  let nombreInputs=["txtNombre","txtRFC","txtEstado","txtDireccion","txtTelefono","txtEmail","txtDescripcion","btnActualizar","btnCancelar2"];
  let inputs=[];
  imgFormulario=document.createElement("img");
  imgFormulario.name="FormModificarImg";
  imgFormulario.src=document.querySelector("[name='hidImgSrcE']").value;
  formularioEnviar.appendChild(imgFormulario);
  for (let i =0;i<7;i++){
parrafo=document.createElement("p");
parrafo.textContent=indicacionesP[i];
formularioEnviar.appendChild(parrafo);
inputs[i]=document.createElement("input");
inputs[i].name=nombreInputs[i];
inputs[i].value=document.querySelector(etiquetasTomar[i]).value;
formularioEnviar.appendChild(inputs[i]);
inputs[i].type="text";
  }
  divContbotones=document.createElement("div");
  divContbotones.classList.add("ContenedorBotones");
  formularioEnviar.appendChild(divContbotones);
  inputs[7]=document.createElement("input");
  inputs[7].type="submit";
  inputs[7].name=nombreInputs[7];
  inputs[7].textContent="Aceptar";
divContbotones.appendChild(inputs[7]);
  inputs[8]=document.createElement("button");
  inputs[8].type="button";
  inputs[8].name=nombreInputs[8];
inputs[8].textContent="Cancelar";
  divContbotones.appendChild(inputs[8]);
  console.log(formularioEnviar);
  return formularioEnviar;
  }


document.addEventListener("DOMContentLoaded",function(){
 let  FormAlta= new ComponenteFormulario("../php/AltaEmpresas.php");
 
    document.body.appendChild(FormAlta);
    
    botonMostrarForm=this.documentElement.querySelector('[id="btnMostrarFormulario"]');

    if (botonMostrarForm){
        botonMostrarForm.addEventListener("click",function(){
        FormAlta.style.opacity=1;
        FormAlta.style.zIndex=10;
        
    });

    botonCancelar=document.querySelector('[name="btnCancelar"]');
     botonCancelar.addEventListener("click",function(e){
        FormAlta.style.opacity=0;
        FormAlta.style.zIndex=-1;
        e.preventdefault();
       
    });
    }  
    

    //para el boton de eliminar
  if(this.documentElement.querySelector("[id='btnEliminar']")) {
    EliminarForm=document.createElement("Form");
    EliminarForm.action="../php/EliminarEmpresa.php";
    document.body.appendChild(EliminarForm);
   boton=document.querySelector("[id='btnEliminar']");
   boton.addEventListener("click",function(){
EliminarForm.submit();
console.log(EliminarForm);
   });

  }

  //para el boton de actualizar 
  if(this.documentElement.querySelector("[id='btnActualizar']")) {
    botonActualizar=document.querySelector("[id='btnActualizar']");
    FormularioActualizar= new ComponenteFormularioModificar("../php/ModificarEmpresa.php");

    document.body.appendChild(FormularioActualizar);
   botonActualizar.addEventListener("click",function(){
    console.log(FormularioActualizar);
    console.log(botonCancelar=document.querySelector('[name="btnCancelar2"]'));
    FormularioActualizar.style.opacity=1;
    FormularioActualizar.style.zIndex=100;
 

   });
   
   botonCancelar=document.querySelector('[name="btnCancelar2"]');
     botonCancelar.addEventListener("click",function(e){
        FormularioActualizar.style.opacity=0;
        FormularioActualizar.style.zIndex=-1;
        console.log(botonCancelar);
        
        
      
       
    });


  }
  

});





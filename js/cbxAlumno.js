



document.addEventListener("DOMContentLoaded",function(){
cbx=document.querySelectorAll("[name='cbxAlumno']");
divNoControl=document.createElement("div");
divNoControl.classList.add("divNoC");
parrafo=document.createElement("p");
parrafo.textContent="Ingresa tu numero de control";
txtNoControl=document.createElement("input");
txtNoControl.placeholder="Ingrese su numero de control";
txtNoControl.name="txtNoControl",
divNoControl.appendChild(parrafo);
divNoControl.appendChild(txtNoControl);

cbx[0].addEventListener("click",function(){
    if(this.checked){
     cbx[1].checked=false;   
     divAgregar=document.querySelector(".AlumnoTec");
     document.querySelector(".AlumnoTec").appendChild(divNoControl);
    }
    
})

cbx[1].addEventListener("click",function(){
    console.log("se preciono 2");
    if(this.checked){
        cbx[0].checked=false;  
        document.querySelector(".AlumnoTec").removeChild(divNoControl);

       }
})
});


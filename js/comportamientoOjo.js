
document.addEventListener("DOMContentLoaded",function(){

btnOjo=document.querySelector("[alt='imgOjo']");
txtContraseña=document.querySelector("[name='txtContraseña']");

if (btnOjo){
    valorOjo=false;
    
btnOjo.addEventListener("click",function(){
    if (valorOjo==false){
   valorOjo=true;
    }

    else if (valorOjo==true){
    valorOjo=false;
    }

    if (valorOjo==false){
    txtContraseña.setAttribute("type","password");
    btnOjo.src="../assets/Imagenes/ImagenesInicioRepresentantes/ojoCerrado.png";
    }
    else if(valorOjo==true){
        txtContraseña.setAttribute("type","text");
        btnOjo.src="../assets/Imagenes/ImagenesInicioRepresentantes/ojoAbierto.png";
    }
    

});

}

});
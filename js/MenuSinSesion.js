document.addEventListener("DOMContentLoaded",function(){
    console.log("Segundo script");
botonMenu=document.getElementById("btnMenu");
menuOpciones=document.getElementById("menuDesplegable");
if (botonMenu){

botonMenu.addEventListener("click",function(e){
menuOpciones.style.opacity="1";
menuOpciones.style.zIndex="400";
e.stopPropagation();
});

document.addEventListener("click",function(e){
if (e.target!=botonMenu && menuOpciones.style.opacity=="1"){
menuOpciones.style.opacity="0";
menuOpciones.style.zIndex="-1";
}

})

}
});
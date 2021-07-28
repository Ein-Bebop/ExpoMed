//Esta función abre el menú
function openM(){
    document.getElementById("header-bar").style.transform = "translateX(0%)";
    document.getElementById("header-dim").style.height = "120vh";
    document.getElementById("menu-close").style.transform = "rotate(-360deg)";
}

//Esta funcioón cierra el menú, quita el transform de 0% a su posición original al igual que el icono cancel y la pantalla oscura del menú
function closeM(){
    document.getElementById("header-bar").style.transform = "";
    document.getElementById("menu-close").style.transform = "rotate(0deg)";
    document.getElementById("header-dim").style.height = "0vh";
}

//Esta funciión onscroll ejecuta la función esconderHeader cada que se baja el scroll
window.onscroll = function() {esconderHeader()};

//Esta función esconde el header al bajar 
function esconderHeader() {
    
   try{//Agregué el try-catch porque en algunas páginas puede que no usemos la función del header y así no nos marca errores en la consola

       //comprueba si el scrollTop es mayor a 20 (me parece que son pixeles) entonces le pone color al header y lo mueve un poco
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("header").style.backgroundColor = "#522d6d";
                document.getElementById("header").style.marginTop = "-20px"; 
        } else {//lo regresa a como estaba si detecta que se regresa al top
                document.getElementById("header").style.backgroundColor = "";
                document.getElementById("header").style.marginTop = "0px";            
        }
        
   }catch(error){
       
    }
}


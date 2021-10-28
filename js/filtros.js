// function filtro(tag){
//     if(tag == "Todos" || tag == "All"){

//         $('.item').css( "display", "flex" );
//         setTimeout(function(){
//             $('.item').css( 'transform', 'scale(1)');
           
//         },60);

//         $('.filtro-option').css( "background-color", "" );
//         $('.filtro-option').css( "color", "" );

//         $('.filtro-option:contains("Todos")').css( "background-color", "var(--verde)" );
//         $('.filtro-option:contains("Todos")').css( "color", "#fff" );

//     }else{

//         $('.filtro-option:contains('+tag+')').css( "background-color", "var(--verde)" );
//         $('.filtro-option:contains('+tag+')').css( "color", "#fff" );

//         $('.filtro-option:not(:contains('+tag+'))').css( "background-color", "" );
//         $('.filtro-option:not(:contains('+tag+'))').css( "color", "" );

        
//         $('.item .proyecto-ubicacion:not(:contains('+tag+'))').closest('.item').css( 'transform', 'scale(0)');
//         setTimeout(function(){
//             $('.item .proyecto-ubicacion:not(:contains('+tag+'))').closest('.item').css( "display", "none" );
//             // $('.item .proyecto-tags:not(:contains('+tag+'))').closest('.item').css( 'transform', 'scale(1)');
//         },300);
        

//         $('.item .proyecto-ubicacion:contains('+tag+')').closest('.item').css( 'transform', 'scale(1)');
//         setTimeout(function(){
//             $('.item .proyecto-ubicacion:contains('+tag+')').closest('.item').css( "display", "flex" );
           
//         },300);

//     }
    
    
// }

// try{
//     document.getElementById("buscarmedico").addEventListener('input', function (evt) {
//         filtroBusqueda();
//     });
// }catch{

// }

var n = document.querySelectorAll(".card-medico").length;

document.getElementById("buscarmedico").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        filtroBusqueda();
    }
});

function filtroBusqueda(){


    document.getElementById("directorio-container").scrollIntoView({block: "center"});
    

    var tag = document.getElementById("buscarmedico").value;
    tag = tag.toLowerCase();
    var e = 0;
    document.getElementById("resultado-texto").innerHTML = tag;

    var clase = document.getElementById("busquedamain").value;
    var clase2;

    if (clase == "Area"){
        clase2 = "rama";
    }

    if (clase == "Nombre"){
        clase2 = "nombre";
    }

    if (clase == "Lugar"){
        clase2 = "ubicacion";
    }
    
    if(tag.length > 2 ){

        do{
            //    console.log("hola " + e);    
               if(document.querySelectorAll(".card-" + clase2)[e].innerText.toLowerCase().indexOf(tag)){
                   console.log(e + "No tiene");
                   document.querySelectorAll(".owl-item")[e].style.display = "none";
               }else{
                    console.log(e + "Si tiene");
                    document.querySelectorAll(".owl-item")[e].style.display = "flex";
               }
               e++;
               
        }while(e < n);
        
    }else if(tag.length == 0){
        do{
            //    console.log("hola " + e);    
                document.querySelectorAll(".owl-item")[e].style.display = "flex";
               
               e++;
               
        }while(e < n);
    }

    
    
}


function tag(){
    
    var tag = document.getElementById("area-f").value;
    tag = tag.toLowerCase();

    
    var e = 0;
    document.getElementById("resultado-texto").innerHTML = tag;


        do{
            //    console.log("hola " + e);    
               if(document.querySelectorAll(".card-rama")[e].innerText.toLowerCase().indexOf(tag)){
                //    console.log(e + "No tiene");
                   document.querySelectorAll(".owl-item")[e].style.display = "none";
               }else{
                    // console.log(e + "Si tiene");
                    document.querySelectorAll(".owl-item")[e].style.display = "flex";
               }
               e++;
               
        }while(e < n);
        
   
    
}


function tag2(){
    
    var tag = document.getElementById("ubicacion-f").value;
    tag = tag.toLowerCase();

    
    var e = 0;
    document.getElementById("resultado-texto").innerHTML = tag;


        do{
            //    console.log("hola " + e);    
               if(document.querySelectorAll(".card-ubicacion")[e].innerText.toLowerCase().indexOf(tag)){
                //    console.log(e + "No tiene");
                   document.querySelectorAll(".owl-item")[e].style.display = "none";
               }else{
                    // console.log(e + "Si tiene");
                    document.querySelectorAll(".owl-item")[e].style.display = "flex";
               }
               e++;
               
        }while(e < n);
        
   
    
}



function borrarFiltro(){
        document.getElementById("resultado-texto").innerHTML = "";
        var e = 0;
        do{
            //    console.log("hola " + e);    
                document.querySelectorAll(".owl-item")[e].style.display = "flex";
               
               e++;
               
        }while(e < n);
    
}

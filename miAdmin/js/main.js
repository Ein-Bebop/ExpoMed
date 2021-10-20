function addM() {
    document.getElementsByClassName("menu-add")[0].style.display = "flex";
    document.getElementsByClassName("menu-add-titulo")[0].innerHTML = "Agregar Médico";
    document.getElementById("form-add").setAttribute('action','operaciones/insertDirectorio.php');
    document.getElementsByClassName("button-a")[0].innerHTML = "Añadir";


    document.getElementsByName('area')[0].value = "";
    document.getElementsByName('nombre')[0].value = "";
    document.getElementsByName('especialidad')[0].value = "";
    document.getElementsByName('descripcion')[0].value = "";
    document.getElementsByName('ubicacion')[0].value = "";
    document.getElementsByName('bio')[0].value = "";
    document.getElementsByName('idInvisible')[0].value = "";

}

function editM(id, area, nombre, especialidad, descripcion, ubicacion, bio, foto) {
    document.getElementsByClassName("menu-add")[0].style.display = "flex";
    document.getElementsByClassName("menu-add-titulo")[0].innerHTML = "Editar Médico";
    document.getElementById("form-add").setAttribute('action','operaciones/editDirectorio.php');
    document.getElementsByClassName("button-a")[0].innerHTML = "Actualizar";

    document.getElementsByName('area')[0].value = area;
    document.getElementsByName('nombre')[0].value = nombre;
    document.getElementsByName('especialidad')[0].value = especialidad;
    document.getElementsByName('descripcion')[0].value = descripcion;
    document.getElementsByName('ubicacion')[0].value = ubicacion;
    document.getElementsByName('bio')[0].value = bio;
    document.getElementsByName('idInvisible')[0].value = id;

}

function cancelAdd() {
    document.getElementsByClassName("menu-add")[0].style.display = "none";
}

function sendForm() {
    document.getElementById("form-add").submit();
}

function deleteById(idDelete){

    if(confirm('¿Esta seguro de que quiere eliminar esta tarjeta?')){
        document.getElementsByName('idToDelete')[0].value = idDelete;
        document.getElementById("form-delete").submit();
    }

}


function addTaller(){
    document.getElementsByClassName("menu-add")[0].style.display = "flex";
    document.getElementsByClassName("menu-add-titulo")[0].innerHTML = "Agregar Taller";
    document.getElementById("form-add").setAttribute('action','operaciones/insertTaller.php');
    document.getElementsByClassName("button-a")[0].innerHTML = "Añadir";


    document.getElementsByName('area')[0].value = "";
    document.getElementsByName('nombre')[0].value = "";
    document.getElementsByName('especialidad')[0].value = "";
    document.getElementsByName('descripcion')[0].value = "";
    document.getElementsByName('ubicacion')[0].value = "";
    document.getElementsByName('idInvisible')[0].value = "";
}

function editTaller(id, tipo, nombre, imparte, descripcion, link) {
    document.getElementsByClassName("menu-add")[0].style.display = "flex";
    document.getElementsByClassName("menu-add-titulo")[0].innerHTML = "Editar Taller";
    document.getElementById("form-add").setAttribute('action','operaciones/editTaller.php');
    document.getElementsByClassName("button-a")[0].innerHTML = "Actualizar";

    document.getElementsByName('area')[0].value = tipo;
    document.getElementsByName('nombre')[0].value = nombre;
    document.getElementsByName('especialidad')[0].value = imparte;
    document.getElementsByName('descripcion')[0].value = descripcion;
    document.getElementsByName('ubicacion')[0].value = link;
    document.getElementsByName('idInvisible')[0].value = id;
}
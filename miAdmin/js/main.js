function addM() {
    document.getElementsByClassName("menu-add")[0].style.display = "flex";
}

function cancelAdd() {
    document.getElementsByClassName("menu-add")[0].style.display = "none";
}

function sendDirectorio() {
    document.getElementById("form-add").submit();
}
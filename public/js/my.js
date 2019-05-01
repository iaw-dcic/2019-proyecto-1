function ajustarAncho(){
    maxAncho = document.getElementById("table_resp").clientWidth;
    anchoEstado = document.getElementById("col_estado").clientWidth;
    anchoAcciones = document.getElementById("col_acciones").clientWidth;
    listas = document.getElementById("col_lista");

    listas.style.width = (maxAncho - anchoEstado - anchoAcciones) +"px";

    document.getElementById("container").classList.remove("invisible");
}

function navigateTo(url){
    window.location.assign(url);
}

function setId(id){
    eliminarForm = document.getElementById('eliminarForm');
    eliminarForm.action = eliminarForm.action + "/" +id;
}

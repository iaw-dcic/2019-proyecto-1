var contador = 1;

var divParticipante1 = '<input type="text" name="jugadores[]" class="form-control" value='
    ;

var divParticipante2 = '  >'
    + '<button type="button" class="btn btn-primary" id='
    ;
var divParticipante3 = ' onClick="quitarParticipante(this.id)">Quitar</button>';

function agregarParticipante() {
    var nuevoNombre = document.getElementById("inputParticipante").value;
    if (nuevoNombre != "") {
        document.getElementById("inputParticipante").value = "";
        var nuevoDiv = document.createElement('div');
        var participante = divParticipante1 + nuevoNombre + divParticipante2 + "participante" + contador + divParticipante3;

        nuevoDiv.innerHTML = participante;
        nuevoDiv.setAttribute('id', 'divparticipante' + contador);
        contador++;

        document.getElementById("containerParticipantes").appendChild(nuevoDiv);
    }
  
}
function quitarParticipante(id) {
    var divBorrar = '#' + 'div' + id;
    $(divBorrar).remove();
}
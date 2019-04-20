
function editarUsuario(perfil) {
    var id = perfil.id;
    var nombre = perfil.nombre;
    var email = perfil.email;
    document.getElementById('perfil.nombre').innerHTML = ' <label class="sr-only"> nombre </label> '
        + '<form>  <input type="text" class="form-control input-lg" name="Nombre" placeholder="' + nombre + '"></form>';
    document.getElementById('perfil.email').innerHTML = ' <label class="sr-only"> email </label> '
        + '<form>  <input type="text" class="form-control input-lg" name="Nombre" placeholder="' + email + '"></form>';

    var apellido = perfil.apellido;
    if (apellido != null) {
        document.getElementById('perfil.apellido').innerHTML = ' <label class="sr-only"> Apellido </label> '
            + '<form>  <input type="text" class="form-control input-lg" name="Nombre" placeholder="' + apellido + '"></form>';
        contentEditable = 'true';
    }
    var descr = perfil.descr;
    if (descr != null) {
        document.getElementById('descripcion').innerHTML = '<form>  <input  type="text" class="form-control input-lg" name="Nombre" placeholder="' + descr + '"></form>';
    }
    else {
        document.getElementById('descripcion').innerHTML += '<form>  <input  type="text" class="form-control input-lg" name="descr" placeholder=" "></form>';
    }

    document.getElementById('button').remove();
    document.getElementById('lugarBoton').innerHTML += '<button id="button" type="submit" class="btn btn-success" onclick="guardar()">'
        + '   Guardar </button>';
}

function guardar() {


}

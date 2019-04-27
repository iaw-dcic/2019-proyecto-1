
function editarUsuario(perfil) {
    var id = perfil.id;
    var nombre = perfil.nombre;
    var email = perfil.email;

    document.getElementById('perfil.nombre').innerHTML = ' <label> Nombre: </label><br> '
        + '<div class="form-group"  > <input type="text" required class="form-control input-lg" name="nombre" value="' + nombre + '"  ></div>';

    document.getElementById('perfil.email').innerHTML = ' <label> email: </label><br> '
        + '<div class="form-group"  >     <input type="email" required class="form-control input-lg" name="email" value="' + email + '"  ></div>';

    var apellido = perfil.apellido;
    if (apellido != null) {
        document.getElementById('perfil.apellido').innerHTML = ' <label> Apellido: </label><br> '
            + '<div class="form-group"  >     <input type="text" class="form-control input-lg" name="apellido" value="' + apellido + '"></div>';

    }
    else {
        document.getElementById('perfil.apellido').innerHTML = ' <label> Apellido: </label><br> '
            + '<div class="form-group"  >     <input type="text" class="form-control input-lg" name="apellido" placeholder=""></div>';
    }
    var descr = perfil.descr;
    if (descr != null) {
        document.getElementById('perfil.descr').innerHTML = '<label> Descripcion (opcional): </label> <br> '
            + '<div class="form-group"  >   <input type="text" class="form-control input-lg" name="descr" value="' + descr + '"></div>';
    }
    else {

        document.getElementById('perfil.descr').innerHTML = ' <label> Descripcion (opcional): </label><br> '
            + '<div class="form-group"  >     <input  type="text" class="form-control input-lg" name="descr" placeholder=" "></div>';
    }

    document.getElementById('button').remove();
    document.getElementById("botonGuardar").style.visibility = "visible";
}

function cargarModal(lista) {
    var id = lista.id;
    var nombre = lista.nombre;
    document.getElementById('selectLista').innerHTML += '<select class="form-control" name="lista"   >'
        + '<option selected="true" value="' + id + '" >' + nombre + ' </option>';

}

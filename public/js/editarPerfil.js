
function editarUsuario(perfil) {
    var id = perfil.id;
    var nombre = perfil.nombre;
    var email = perfil.email;

    document.getElementById("botonImagen").innerHTML = '<div class="form-group">'
        + '  <label for="inputMessage">Imagen:</label>'
        + ' <input type="file" name="filename" class="form-control">'
        + '  </div>';

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
    document.getElementById('selectLista').innerHTML = ' <label  id="selectLista" for="inputName" >Lista</label>'

        + '<select class="form-control" name="lista"   >'
        + '<option selected="true" value="' + id + '" >' + nombre + ' </option></select>';

}

function agregarIngrediente(ingredientes) {
    var agrega;
    document.getElementById("botonmas").remove();
    var veces = document.getElementById("ingnumero").value;
    agrega += ingredientes[0].id;
    /*   for (i = 1; i <= veces; i++) {
           agrega += '<div class="row">'
               + '<div class="col-6">'
               + ' <div class="form-group">'
               + '  <label for="inputMessage">Ingrediente:</label>'
               + '  <select name="ingrediente' + i + '" class="form-control">';
     
           ingredientes.forEach(function (ingrediente) {
               agrega += + ' <option value=" ' + ingrediente.id + ' ">'
                   + ingrediente.nombre + ' </option>';
           });
           agrega += '    </select>'
               + '</div>'
               + ' </div>'
               + ' <div class="col-3">'
               + ' <div class="form-group">'
               + '<label for="inputMessage">Medida:</label>'
               + '    <select name="medida" class="form-control">';
     
           medidas.forEach(function (medida) {
               agrega += + ' <option value=" ' + medida.id + ' "> '
                   + medida.nombre + ' </option>';
           });
           agrega += '    </select>'
               + '   </div>'
               + ' </div>'
               + '<div class="col-3">'
               + '   <div class="form-group">'
               + '   <label for="inputMessage">Cantidad:</label>'
               + '  <input name="cantidad" type="number" class="form-control" placeholder="Cantidad" />'
               + ' </div>'
               + ' </div>'
               + ' <hr>'
               + '         </div>'
               + '         </div>';
       }*/
    document.getElementById("ingredientesContainer").innerHTML = agrega;
}


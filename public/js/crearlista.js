
var timestamp = new Date().getUTCMilliseconds();

var nuevaCancion = '<div ' + 'id = "divsong' + timestamp +'">'
                +       '<div class="form-row">'
                +           '<div class="form-group col-md-4">'
                +               '<label class="text-white" for="songname">Nombre de Cancion</label>'
                +               '<input type="text" class="form-control" id="songname" name="songnames[]" required>'
                +           '</div>'
                +        '<div class="form-group col-md-3">'
                +             '<label class="text-white" for="artist">Artista</label>'
                +              '<input type="text" class="form-control" id="artist" name="artists[]" required>'
                +          '</div>'
                +           '<div class="form-group col-md-3">'
                +              '<label class="text-white" for="album">Album</label>'
                +              '<input type="text" class="form-control" id="album" name="albums[]" required>'
                +          '</div>'
                +         '<div class="form-group col-md-2 align-self-end">'
                +             '<button class="btn btn-danger" type="button" id="song'+timestamp+'" onclick="quitarCancion(this.id)">Quitar</button>'
                +         '</div>'
                +       '</div>'
                +   '</div>'
                ;

function agregarCancion() {
    document.getElementById("songscontainer").innerHTML += nuevaCancion;
}

function quitarCancion(id){
    var divremove = "#"+"div"+id;
    $(divremove).remove();
}

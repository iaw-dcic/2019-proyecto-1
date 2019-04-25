
var timestamp = new Date().getUTCMilliseconds();
var divCount = 1;
var nuevaCancionParte1 =  '<div class="form-row">'
                +           '<div class="form-group col-md-4">'
                +               '<label class="text-white" for="songname">Nombre de Cancion</label>'
                +               '<input type="text" class="form-control" id="songname" name="songs[song'
                ;
var nuevaCancionParte2 =                                                                                '][song]" required autofocus>'
                +           '</div>'
                +           '<div class="form-group col-md-3">'
                +             '<label class="text-white" for="artist">Artista</label>'
                +              '<input type="text" class="form-control" id="artist" name="songs[song'
                ;
var nuevaCancionParte3 =                                                                            '][artist]" required>'
                +           '</div>'
                +           '<div class="form-group col-md-3">'
                +              '<label class="text-white" for="album">Album</label>'
                +              '<input type="text" class="form-control" id="album" name="songs[song'
                ;
var nuevaCancionParte4 =                                                                            '][album]" required>'
                +           '</div>'
                +           '<div class="form-group col-md-2 align-self-end">'
                +             '<button class="btn btn-danger" type="button" id="song'
                ;
                
var nuevaCancionParte5 =                                                                '" onclick="quitarCancion(this.id)">Quitar</button>'
                +           '</div>'
                +          '</div>'
                ;

function agregarCancion() {
    var nuevoDiv = document.createElement('div');
    nuevaCancionConID= nuevaCancionParte1 + divCount + nuevaCancionParte2 + divCount + nuevaCancionParte3 + divCount + nuevaCancionParte4 + divCount + nuevaCancionParte5; 
    nuevoDiv.innerHTML = nuevaCancionConID;
    nuevoDiv.setAttribute('id','divsong'+divCount);
    document.getElementById("songscontainer").appendChild(nuevoDiv);
    divCount++;
}

function quitarCancion(id){
    var divremove = "#"+"div"+id;
    $(divremove).remove();
}

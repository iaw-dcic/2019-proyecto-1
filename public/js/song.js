
function storeSong(playlist_id) {

    var data = new FormData();

    data.append('nombre', $('#inputNombre').val() );
    data.append('artista', $('#inputArtista').val() );
    data.append('album', $('#inputAlbum').val() );
    data.append('year', $('#inputYear').val());
    data.append('genero', $('#inputGenero').val() );
    data.append('playlist_id', playlist_id);

    jQuery.each(jQuery('#inputFile')[0].files, function(i, file) {
        data.append('imagen-'+i, file);
    });

    jQuery.ajax({
        url: '/song/store',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(data){
            alert('Cancion creada exitosamente.');
        }
    });

}

function deleteSong(id) {
    var row = $('#song-row-'+id);

    $.get('/song/delete/'+id, function (data) {
        row.empty();
        $('#modal-eliminar-'+id).modal('dispose');
    })

}
